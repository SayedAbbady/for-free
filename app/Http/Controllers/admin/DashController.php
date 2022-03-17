<?php

namespace App\Http\Controllers\admin;

use App\Models\units;
use App\Models\levels;
use App\Models\lessons;
use App\Models\sections;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->role = Auth::user()->role;
            $role = $this->role;

            if ($role != '1') {
                return redirect()->route('home');
            }

            return $next($request);
        });  
    }

    public function index()
    {
        $units = units::count();
        $sections = sections::count();
        $levels = levels::count();
        $lessons = lessons::count();
        $users = User::where('role','0')->count();
        $admins = User::where('role','1')->count();
        return view('admin.index',[
            'units' => $units,
            'sections' => $sections,
            'levels' => $levels,
            'lessons' => $lessons,
            'users' => $users,
            'admins' => $admins
        ]);
    }
}
