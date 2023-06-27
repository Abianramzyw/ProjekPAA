<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public function login()
    {
        return view ('login');
    }

    public function post_login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/cars');
        } else {
            // Alert::error('Terjadi Kesalahan', 'Silahkan periksa kembali email/password anda!');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        return view('register');
    }

    public function post_register(Request $request)
    {
        // dd($request->all());
        if(!isset($request->name)) {
            toast('Nama harus diisi!', 'error', 'top-right');
            return back()->withInput();
        } elseif(!isset($request->email)) {
            toast('Email harus diisi!', 'error', 'top-right');
            return back()->withInput();
        } elseif(!isset($request->password)) {
            toast('Password harus diisi!', 'error', 'top-right');
            return back()->withInput();
        } else {
            $input = $request->all();
            $validate = [
                'name' => 'required|string|min:3',
                'email' => 'required|email',
                'password' => 'required',
            ];

            $validation = Validator::make($input, $validate);

            if($validation->fails()){
                toast('Data tidak valid!', 'error', 'top-right');
                return back()->withInput();
            } else {
                User::create([
                    'name'      => $request->name,
                    'email'     => $request->email,
                    'password'  => $request->password,
                ]);
            }
        
            return redirect('/');
        }
    }
}
