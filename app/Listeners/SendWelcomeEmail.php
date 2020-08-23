<?php

namespace App\Listeners;

use Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Registered $event){
        $data = array('name'=>$event->user->name, 'email' => $event->user->email, 'body' => 'Welcome to our website. Hope you will find a chance to sell or buy anything!');
        Mail::send('emails.mail', $data, function($message) use ($data){
            $message->to($data['email'])
                    ->subject('Welcome to PRESTO');
            $message->from('noreply@prestoAgP91.net');
        });
    }
}
