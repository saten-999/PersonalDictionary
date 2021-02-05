<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Dictionary;
use Auth;
class Reminder extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $words = json_decode(Dictionary::where('user_id', Auth::user()->id)->get());

        if(count($words)>0 && count($words)<=5){
            $return = $words ;
        } 
        elseif(count($words)>0 && count($words)>5){
            echo "che";
        }
        else{
            return;
        }
        return $this->subject('Mail from Reminder')->view('mail',[
            'words' =>  $return
        ]);
    }
}
