<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()  
    {
        return view('/dashboard')
        ->with('seccion', 'dashboard')
        ->with('subseccion', '')
        ->with('subseccion', '')
        ;
    }
}
