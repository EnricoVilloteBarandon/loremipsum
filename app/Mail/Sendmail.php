<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class Sendmail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct()
    {
        //
    }
    public $foo = 'Foobar';
    public function build()
    {
        $data = [
            'user' => 11
        ];
        return $this->view('mailtemplates.basic',$data);
    }
}
