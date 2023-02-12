<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialized;
use App\Models\User;
use Illuminate\Http\Request;

class SpecialController extends Controller
{
    public function index(){
        $listSpeciall = User::select('*')->get();
        return view('admin.speciall.index',[
            'listSpecial' => $listSpeciall
        ]);
    }
}
