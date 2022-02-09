<?php
// B180910040 Sainjargal
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct()
    {
        $this->data = $data;
    }

    public function build()
    {
        $address = 'sainaabek@gmail.com';
        $subject = 'This is a demo!';
        $name = 'Sakbek';
        
        return $this->view('Mail.Mail')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'message' => $this->data['message'] ]);
    }
}
