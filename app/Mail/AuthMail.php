<?php
// B180910040 Sainjargal
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AuthMail extends Mailable
{
   use Queueable, SerializesModels;
   public $data;
   public $type;

   public function __construct($data, $type) {
    $this->data = $data;
    $this->type = $type;
   }
   
    public function build() {
        $subject = 'Register';
        $subject1 = 'Login';
        if($this->type == "login")
            return $this->view('email_templates.login_auth')->subject($subject1);
        else if($this->type == "register")
            return $this->view('email_templates.register_auth')->subject($subject);
    }
}