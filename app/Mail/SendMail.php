<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\CustomerComment;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*date_default_timezone_set("Europe/Amsterdam");

        $Comment_arr = [

                    'user_id' => $user_id,
                    
                    'message' => 'Customer verified.',
                ];


        CustomerComment::create($Comment_arr);*/
        
        return $this->from('zappos@gmail.com')->subject('Thank you message')->view('livewire.thank-mail')->with('data',$this->data);

        
        //return $this->view('view.name');
    }
}
