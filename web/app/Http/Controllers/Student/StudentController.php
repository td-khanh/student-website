<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
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
            return 'true';
        } else {
            return dd(Auth::attempt($data));
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
            $newUser = new Student();
            $newUser->fill($data->all());
            $newUser->status = 1;
            $newUser->name = $data->name;
            $newUser->phone = '0' + $data->phone;
            $newUser->avatar = '';
            if ($data->email) {
                if ($emailCheck = Student::select('email')->where('email', '=', $newUser->email)->first()) {
                    if ($data->email == $emailCheck['email']) {
                        return redirect()->route('student.auth.register');
                    }
                } else {
                    $newUser->email = $data->email;
                }
            }
             $newUser->password = Hash::make($data->password);
           // $newUser->password = $data->password;
            $newUser->save();
            return redirect()->route('student.auth.login');
        }
    }
}
