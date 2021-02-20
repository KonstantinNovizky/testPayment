<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {   
        $active = "dashboard";
        return view("user.index", compact('active'));
    }
    public function go()
    {
        return 'welcome';
    }
}