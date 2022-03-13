<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:6', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|confirmed|max:255'
        ]);

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $tokenn = '';
        for ($i = 0; $i < 255; $i++) {
            $tokenn .= $characters[rand(0, $charactersLength - 1)];
        }

        $token = $tokenn;
        // $token = mt_rand(10000000000000000, 99999999999999999);
        
        $validatedData['token'] = $token;

        $validatedData['password'] = Hash::make($validatedData['password']); // harus tambah use Illuminate\Support\Facades\Hash;

        User::create($validatedData);

        $this->_sendEmail($token, 'verify', $validatedData['email']);

        // $request->session()->flash('success', 'Registration successfull!');

        return redirect('/login')->with('success', 'Pendaftaran Berhasil!, Silahkan Cek Email Untuk Melakukan Verifikasi.');
    }

    public function storeLupaPassword(Request $request)
    {
        
        $validatedData = $request->validate([
            'email' => 'required|email:dns',
        ]);

        if (DB::table('users')->where(['email' => $validatedData['email'], 'active' => 1])->exists()){

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $tokenn = '';
            for ($i = 0; $i < 255; $i++) {
                $tokenn .= $characters[rand(0, $charactersLength - 1)];
            }

            $token = $tokenn;
            User::where('active', 1)
                ->where('email', $validatedData['email'])
                ->update(['token' => $token]);

            $this->_sendEmail($token, 'forgot', $validatedData['email']);

            return redirect('/lupaPassword')->with('success', 'Berhasil! Sila cek email buat reset ulang pass.');
        } else {
            return redirect('/lupaPassword')->with('loginError', 'Gagal! email belum terdaftar atau belum aktif.');
        }
    }

    private function _sendEmail($token, $type, $email)
    {
        if($type == 'verify'){
            $data=[
                'message' => 'Untuk melakukan verifikasi email akun BKK Muhammadiyah Kandangahaur, silahkan untuk klik tombol dibawah ini!',
                'url' => url('').'/verify/'.$email.'/'.$token,
                'title' => 'Hai',
            ];
        } elseif ($type == 'forgot') {
            $data=[
                'message' => 'Untuk melakukan reset pass akun kamuU BKK Muhammadiyah Kandangahaur, silahkan untuk klik tombol dibawah ini!',
                'url' => url('').'/resetPassword/'.$email.'/'.$token,
                'title' => 'Hai',
            ];
        }
        
        Mail::to($email)->send(new SendMail($data));

        // if(Mail::to($email)->send(new SendMail($data))){
        //     return true;
        // }else{
        //     dd(Mail::to($email)->send(new SendMail($data)));
        // }
    }

    public function verify($email, $token)
    {

        //cek kesesuaian email dg yang ada di db
        if (DB::table('users')->where('email', $email)->exists()) {
            DB::table('users')
                ->where('email', $email)
                ->get();
                
            //cek kesesuaian token dg yang ada di db
            if (DB::table('users')->where(['email' => $email, 'token' => $token])->exists()) {
                DB::table('users')
                    ->where('token', $token)
                    ->get();
                    
                DB::table('users')
                    ->where('email', $email)
                    ->update([
                        'email_verified_at' => date('Y-m-d H:m:s'),
                        'active' => 1,
                        'token' => null
                    ]);
                
                return redirect('/login')->with('success', 'Akun Sudah terverifikasi! Silakan login.');
                
            } else {
                DB::table('users')
                    ->where('email', $email)
                    ->update(['token' => null]);
                
                return redirect('/login')->with('loginError', 'Akun Gagal terverifikasi! Token salah.');
            }
        } else {
            return redirect('/login')->with('loginError', 'Akun Gagal terverifikasi! Email salah.');
        }
    }

    public function forgot(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5|confirmed|max:255'
        ]);

        $password = Hash::make($validatedData['password']);

        User::where('email', $validatedData['email'])->update(['password' => $password, 'token' => null]);

        return redirect('/login')->with('success', 'Berhasil ubah pass! Sila login.');
    }

    public function lupaPassword()
    {
        return view('lupaPassword.index', [
            'title' => 'Lupa Password',
            'active' => 'Lupa Password'
        ]);
    }
    
    public function resetPassword($email, $token)
    {
        //cek kesesuaian email dg yang ada di db
        if (DB::table('users')->where('email', $email)->exists()) {
            DB::table('users')
                ->where('email', $email)
                ->get();
                
            //cek kesesuaian token dg yang ada di db
            if (DB::table('users')->where(['email' => $email, 'token' => $token])->exists()) {
                
                return view('resetPassword.index', [
                    'title' => 'Lupa Password',
                    'active' => 'Lupa Password',
                    'email' => $email,
                ]);
                
            } else {
                DB::table('users')
                    ->where('email', $email)
                    ->update(['token' => null]);
                
                return redirect('/login')->with('loginError', 'Gagal reset pass! Token salah.');
            }
        } else {
            return redirect('/login')->with('loginError', 'Gagal reset pass! Email salah.');
        }
    }

}