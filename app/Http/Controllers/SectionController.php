<?php

namespace App\Http\Controllers;

use App\Models\sections;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function show($id=null)
    {
        if (is_null($id)) {
            return redirect()->route('home');
        } else {
            $sec = sections::where('s_id',$id)->get();
            if ($sec->count() >= 1) {
                return view('user.section',['sec'=> $sec]);
            } else {
                return redirect()->route('home');
            }
        }
    }
}
