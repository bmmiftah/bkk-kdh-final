<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class KirimEmailController extends Controller
{
    public function kirim()
    {
        $email = 'bammm.dev@gmail.com';
        $data = [
            'title' => 'Hallo',
            'url' => 'https://bkk-kdh.test',
        ];
        Mail::to($email)->send(new SendMail($data));
        return 'Berhasil mengirim email!';
    }
}
