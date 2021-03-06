<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\User;
use App\Mail\Reminder;
use Carbon\Carbon;
use App\Dictionary;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Artisan;
class Remind1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:remind1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $users = User::get();

        // $us = $this->argument('id');
         

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
            if($user->id <= 135)      {
                continue;
            }
            Mail::to($user->email)->send(new Reminder($return));
        }
     
        

           
    }
}
