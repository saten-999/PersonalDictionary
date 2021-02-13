<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\User;
use App\Mail\Reminder;
use Carbon\Carbon;
use App\Dictionary;
use Illuminate\Support\Facades\Artisan;
class Remind extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remind';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $this->info('Waiting '. $this->nextMinute(). ' for next run of scheduler');

        sleep($this->nextMinute());

        $this->runScheduler(); 
    }


        protected function runScheduler()
        {
            $users = User::latest()->get();

            foreach ($users as $user) {

                $words = Dictionary::where('user_id', $user->id)->get()->toArray();

                if(count($words)>0 && count($words)<=5){
                    $return = $words ;
                } 
                elseif(count($words)>0 && count($words)>5){
                    $return =array();
                    $numbers = range(0, count($words)-1);
                    
                    shuffle($numbers);
                   

                    for ($i=0; $i <5 ; $i++) { 

                        $return[$i] = $words[$numbers[$i]];
                    }
                }
                else{
                    continue;
                }
                Mail::to($user->email)->send(new Reminder($return));
            
            }
            Artisan::call('schedule:run');

            sleep($this->nextMinute());

            $this->runScheduler();
        }


            protected function nextMinute()
            {
                $current = Carbon::now();

                return 600 - $current->second;
            }

}
