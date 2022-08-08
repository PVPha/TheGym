<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function order()
    {
        $data = array('name' => "PVP");
        Mail::send('mail.orderShipped', $data, function ($message) {
            $message->to('pvpdaoclone2@gmail.com', 'testmail')->subject('test send mail');
            $message->from('pvpdaoclone3@gmail.com', 'pvp');
        });
        echo "HTML Email Sent. Check your inbox.";
        // Mail::to('pvpdaoclone2@gmail.com')->send(new OrderShipped());
    }
}