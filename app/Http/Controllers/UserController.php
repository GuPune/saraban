<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\agency;
use App\Models\branch;
use App\Models\Prefix;
use App\Models\Department;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    } 
    
}
