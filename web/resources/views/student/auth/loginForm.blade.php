@extends('layouts.student.login')
@section('content-title','Đăng Nhập')
@section('content')
<style>
    html,body{
        height: 100%;
        display: block;
    }
    body{
        overflow: auto;
        overscroll-behavior: none;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

    }
    .input-container{
        display: grid;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        background-color: #0f2027;
    }
    .input-container form{
        background-color: #f2f2f2;
        height: 550px;
        width: 450px;
        border-radius: 10px;
        padding: 70px;
        display: grid;
        justify-content: center;
        align-items: center;
        
        
    }
    .input-container form h1{
        background-color: #f2f2f2;
        text-align: left;
        padding: 10px 0 10px 20px;
        border-left: 8px solid #2c5364;
        box-shadow: 5px 8px 10px -3px #555;
    }
    .input-container form .inputbox{
        position: relative;
        width: 300px;
        height: 30px;

    }
    .input-container form .inputbox input{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        border: 2px solid #000;
        outline: none;
        background-color: none;
        padding: 10px;
        border-radius: 10px;
        font-size: 1.2em;
        transition: all 0.5s ease;
        box-shadow: 0 8px 8px -6px #555;
    }
    .input-container form .inputbox span{
        position: absolute;
        top: 14px;
        left: 20px;
        font-size: 1em;
        transition: 0.6s;
    }
    .input-container form .inputbox input:focus ~ span, 
    .input-container form .inputbox input:valid ~ span{
        transform: translateX(-13px) translateY(-35px);
        font-size: 1em;
    }
    .input-container form .inputbox input:focus{
        box-shadow: none;
    }
    .input-container form button{
        background: #203A43;
        font-size: 1.2em;
        color: white;
        border: none;
        outline: none;
        border-radius: 10px;
        width: 150px;
        height: 40px;
        letter-spacing: 2px;
        transition: background ease-in-out 200ms;
        transition: transform 100ms;
        box-shadow: 0 8px 6px -6px #555;

    }
    .input-container form button:hover{
        background: #152b35;
    }
    .input-container form button:hover:active{
        background: #0a151a;
        transform: scale(0.9);
        box-shadow: none;
    }
   
</style>
<div class="input-container">
    <form action="{{route('student.auth.postLogin')}}" method="post">
        @csrf
        <h1>Login Form</h1>
        <div class="inputbox">
            <input type="email" name="name" autocomplete="off">
            <span>Email</span>
        </div>
        <div class="inputbox">
            <input type="password" name="password" autocomplete="off">
            <span>Password</span>
        </div>
        <div>
        <button type="submit">Login</button> 
        <!-- or   <a href=""><i class="fa-brands fa-google"></i></a> -->
        </div>
    </form>
</div>
@endsection