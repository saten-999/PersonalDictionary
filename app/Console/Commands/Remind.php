<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\User;
use App\Mail\Reminder;
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

        while (true) {

            $users = User::latest()->get();

            foreach ($users as $user) {

                Mail::to('satabr1999@gmail.com')->send(new Reminder());
            
            }
          
            // $this->call('schedule:run');

        }
   
    
}

}
