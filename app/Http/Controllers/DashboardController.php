<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function dashboard()  
    {
        
        return view('/dashboard')
        ->with('seccion', 'dashboard')
        ->with('subseccion', '')
        ;
    }
}
