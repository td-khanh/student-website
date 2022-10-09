<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        
    }

    //handle login
    public function loginForm(){
        return view('student.auth.loginForm');
    }
    public function postLogin(Request $data){
       
    }
    //handle register
    public function registerForm(){
        return view('student.auth.registerForm');
    }
    public function postRegister(Request $data){
        
    }
}
