<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function postLogin(Request $data)
    {
        if ($data) {
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
            $newUser->phone = $data->phone;
            $newUser->avatar = '';
            if ($data->email) {
                // $emailCheck;
                if ($emailCheck = Student::select('email')->where('email', '=', $newUser->email)->first()) {
                    if ($newUser->email == $emailCheck['email']) {
                        redirect('student.auth.register');
                    } else {
                        $newUser->email = $data->email;
                    }
                }
            }
            $newUser->password = Hash::make($data->password);
        }
    }
}
