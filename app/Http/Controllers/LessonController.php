<?php

namespace App\Http\Controllers;

use App\Models\lessons;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($lesson_id=null, $level=null)
    {
        if (is_null($lesson_id) || is_null($level)) {
            return redirect()->route('home');
        } else {
            $q = lessons::where('l_level',$level);
            $lesson_one = lessons::where('l_id',$lesson_id)->first();
            
            return view('user.lesson',[
                'lessons'=> $q->get(),
                'lessono'=> $lesson_one
            ]);
            
        }
    }
}
