<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Lang;
use App\Models\mail_notification;
use App\Models\User;



class ResetPassword extends Notification implements ShouldQueue
{

     use Queueable;

     public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $MailMessage = mail_notification::where('id', 3)->first();
        $userdata = User::where('email', $notifiable->getEmailForPasswordReset())->first();
        $MailMessage->discripation = str_replace('{name}', $userdata->first_name .' '. $userdata->last_name, $MailMessage->discripation);
        $url = url(route('password.reset.front', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

         $imageget = asset("storage/mailimg/rotation-lock-blue.png"); 
        
         $admin_logo = asset("storage/mailimg/adminlogo.png"); 

           
        $MailMessage->discripation = str_replace('{image_reset}', '<tr><td><img src='.$imageget.' style="width: 7em; height: 7em; "></td></tr>', $MailMessage->discripation);
       
        $MailMessage->discripation = str_replace('{image_footer}', '<tr><td style="text-align: center; padding: 3em 15px 0; "><img src='.$admin_logo.' style="width: 8em; margin-bottom: 0.4em;"></td></tr>', $MailMessage->discripation);

        
        $MailMessage->discripation = str_replace('{reset_button}', '<a href='.$url.' rel="noopener" class="button button-primary" target="_blank">Reset Password</a>', $MailMessage->discripation);
        
        $MailMessage->discripation = str_replace('{reset_live_url}', '"If you are having trouble clicking the button, copy and paste the URL below"."into your web browser:",<span class="break-all">'.$url.'</span>', $MailMessage->discripation);
         

        return (new MailMessage)
            ->subject(Lang::get('Reset Password Notification'))
            ->line(Lang::get($MailMessage->discripation))
            ->action(Lang::get('Reset Password'), $url)
            ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('If you did not request a password reset, no further action is required.'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
