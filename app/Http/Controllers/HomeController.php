<?php

namespace App\Http\Controllers;

use App\Models\units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
        //     $this->role = Auth::user()->role;
        //     $role = $this->role;
            
            
        //     if ($role != '0') {
        //         return redirect()->route('adminhome');
        //     }

        //     return $next($request);
        // }); 
    }


    public function index()
    {
       return view('user.home');
    }

}
