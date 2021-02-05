<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\User;
use App\Mail\Reminder;
use Carbon\Carbon;
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
        // while (true) {

        //     $users = User::latest()->get();

        //     foreach ($users as $user) {

        //         Mail::to('satabr1999@gmail.com')->send(new Reminder());
            
        //     }
          
        //     $this->call('schedule:run');

        // }
   
    
}


        protected function runScheduler()
            {
                
                $this->info('Running scheduler');

                    $users = User::latest()->get();

                    foreach ($users as $user) {
        
                        Mail::to($user->email)->send(new Reminder());
                    
                    }
                Artisan::call('schedule:run');

                $this->info('completed, sleeping..');

                sleep($this->nextMinute());

                $this->runScheduler();
            }


            protected function nextMinute()
            {
                $current = Carbon::now();

                return 120 - $current->second;
            }

}
