<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sections;
use App\Traits\PhotoTrait;

class SectionController extends Controller
{

    use PhotoTrait;

    public function index()
    {
        $sections = sections::all();
        return view('admin.sections.index',[
            'sections'=>$sections
        ]);
        
    }

    public function create()
    {
        return view('admin.sections.create');
    }

    public function store(Request $request) 
    {
    
    
        $request->validate([
            'title'        =>'required', 
            'unit'        =>'required', 
            'file'         =>'required|image'
        ]);
            
        $file_name = $this->savePhoto($request->file , 'upload/');
    
        $slider = sections::create([
            "s_name"            =>$request->title,
            "s_img"       =>'upload/'.$file_name,
            "s_unit"    =>$request->unit,
            "s_last_lesson" => '0'
        ]);

        if ($slider)
            return response()->json([
                "status"    => '1',
                "msg"       => 'Added successfully'
            ]);
        else
            return response()->json([
                "status"    => '0',
                "msg"       => 'Sorry, please try again'
            ]);

    } 

    public function edit($id)
    {
        $section = sections::where('s_id',$id)->get();
        return view('admin.sections.edit',[
            'section'=>$section
        ]);
    }

    public function updateSection(Request $request) 
    {
        $request->validate([
            'title'        =>'required', 
            'bg'           =>'required',
            'id'           =>'required',
            'unit'           =>'required'
        ]);
            
        if ($request->has('file')) {
            $request->validate(['file'=>'required|image']);
            $file_name = 'upload/'.$this->savePhoto($request->file , 'upload/');
        } else {
            $file_name = $request->bg;
        }
        $slider = sections::where('s_id',$request->id)
                ->update([
                        "s_name"            =>$request->title,
                        "s_img"             =>$file_name,
                        "s_unit"            =>$request->unit
                    ]);

        if ($slider)
            return response()->json([
                "status"    => '1',
                "msg"       => 'Edit successfully'
            ]);
        else
            return response()->json([
                "status"    => '0',
                "msg"       => 'Sorry, please try again'
            ]);
    } 

    public function deleteSection(Request $request)
    {
        $sliderDelete = sections::where('s_id',$request->id)->delete();
        
        if ($sliderDelete)
            return redirect()->route('section')->with([
                "status"    => '1',
                "msg"       => 'Section, deleted successfully'
            ]);
        else
            return  redirect()->route('section')->with([
                "status"    => '0',
                "msg"       => 'Sorry, please try again'
            ]);
    }

     
}
