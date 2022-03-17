<?php

namespace App\Http\Controllers;

use App\Models\units;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function show($id=null)
    {
        if (is_null($id)) {
            return view('user.home',['units'=>units::all()]);
        } else {
            return view('user.unit',['units'=>units::where('u_id',$id)->get()]);

        }
    }
}
