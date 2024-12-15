<?php

namespace App\Http\Controllers;


use App\Mail\TestMail; //mailableクラス（送信するメール）

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; //Mailファサード使う
use Illuminate\Mail\Mailable;



class MailSendController extends Controller
{

    // public function index()
    // {
    //     $data = ['A','B'];

    //     Mail::send('emails.mailsend', $data, function($message){
    //     $message->to('hoge@example.com', 'Test') //宛先
    //             ->subject('test mail'); //件名
    //     });

    //     // return redirect('/');
    //     // return view('welcome');
    //     return view('emails.mailsend');
    // }


    public function index()
    {
        return view('otameshi');
    }


    public function ship(Request $request) //requestってなに？？
    {

        Mail::to('example@example.com') //mailファサードを使っている？
            ->send(new TestMail('example@example.com')); //引数適当に入れないとエラーだったので入れた

            return view('emails.mailsend');
    }



}
