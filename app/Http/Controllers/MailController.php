<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Sendmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{
    public function Sendemail(){
        $data = [
            'test' => 'Testing'
        ];
        Mail::to('enricobarandon2@gmail.com')
            ->send(new Sendmail,$data);
        return Redirect::to('/');
    }
}
