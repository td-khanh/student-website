<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('student.news');
    }

    //handle login
    public function loginForm()
    {
        return view('student.auth.loginForm');
    }
    public function postLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            // status 1: student
            // _______2: teacher
            //________3: admin
            if(Auth::user()->status == 3){
                return redirect()->route('admin.index');
            } if (Auth::user()->status == 2) {
                return redirect()->route('teacher.index');
            } else {
                return redirect()->route('student.index');
            }
        } else {
            return redirect()->route('student.auth.login');;
        }
        
    }
    
    //handle register
    public function registerForm()
    {
        return view('student.auth.registerForm');
    }
    public function postRegister(Request $data)
    {
        if ($data) {
            $newUser = new User();
            $newUser->fill($data->all());
            $newUser->status = 1;
            $newUser->name = $data->name;
            $newUser->phone = '0' + $data->phone;
            $newUser->avatar = '';
            if ($data->email) {
                if ($emailCheck = User::select('email')->where('email', '=', $newUser->email)->first()) {
                    if ($data->email == $emailCheck['email']) {
                        return redirect()->route('student.auth.register');
                    }
                } else {
                    $newUser->email = $data->email;
                }
            }
             $newUser->password = Hash::make($data->password);
            $newUser->save();
            return redirect()->route('student.auth.login');
        }
    }
    //logout 
    public function logOut(Request $request){
        if($request){
            Auth::logout();
            return redirect()->route('home');
        }
    }
}
