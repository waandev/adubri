<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from Brita3813',
            'body' => 'This is a test email sent from your hosting using Laravel.'
        ];

        Mail::to('aswanmuhammad89@gmail.com')->send(new TestMail($details));

        return "Email Sent";
    }
}
