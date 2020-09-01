<?php


namespace App\Http\Controllers;


use App\Ad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController
{
    public function login(){
        return view('content');
    }
    public function logout(){
        Auth::logout();
        return redirect()->to(request()->server('HTTP_REFERER'));
    }
    public function check(){
        $validator = Validator::make(
            request()->all(),
            [
                'username' => 'required|min:5|max:255',
                'password' => 'required|min:8|max:255'
            ]
        );
        if ($validator->fails()){
            return redirect()
                ->route('home')
                ->withErrors($validator->errors())
                ->withInput(request()->all());
        }
        $referer = request()->server('HTTP_REFERER');
        $credentials =[
            'username' => request()->get('username'),
            'password' => request()->get('password')
        ];
        $remember = request()->get('remember') === 'on';
        if(!Auth::attempt($credentials,$remember)){
            return redirect($referer)
                ->withErrors(['username' =>  'Invalid Username or Password.']);
        };

        return redirect($referer);
    }
}
