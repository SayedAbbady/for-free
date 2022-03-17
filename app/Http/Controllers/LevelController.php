<?php

namespace App\Http\Controllers;

use App\Models\lessons;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function show($id=null)
    {
        if (is_null($id)) {
            return redirect()->route('home');
        } else {
            $q = lessons::where('l_level',$id);
            if ($q->count() >= 1) {
                return view('user.lesson',[
                    'lessons'=> $q->get(),
                    'lessono'=> $q->first()
                ]);
            } else {
                return redirect()->route('home');
            }
        }
    }
}
