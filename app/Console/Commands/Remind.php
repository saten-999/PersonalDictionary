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

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::whereNotNull('email_verified_at')->take(100)->get()->toArray();

        for ($i=0; $i < count($users) ; $i++) { 
           
            $words = Dictionary::where('user_id', $users[$i]['id'])->get()->toArray();
            
            if(!empty($words)>0 && count($words)<=5){
                $return = $words ;
            }elseif(!empty($words)>0 && count($words)>5){
                $return =[];
                $numbers = range(0, count($words)-1);
                
                shuffle($numbers);
               
                for ($j=0; $j <5 ; $j++) { 
                    $return[$j] = $words[$numbers[$j]];
                }
            }else{
                continue;
            }     
            
            Mail::to($users[$i]['email'])->send(new Reminder($return));
            
        } 

    }




         

}
