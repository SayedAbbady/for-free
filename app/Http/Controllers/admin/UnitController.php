<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\units;
use App\Traits\PhotoTrait;

class UnitController extends Controller
{
    use PhotoTrait;

    public function index()
    {
        $units = units::all();
        return view('admin.unit.index',[
            'units' =>$units 
        ]);
    }

    public function create()
    {
        return view('admin.unit.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'title'        =>'required', 
            'file'         =>'required|image'
        ]);
            
        $file_name = $this->savePhoto($request->file , 'upload/');
    
        $slider = units::create([
            "u_name"            =>$request->title,
            "u_img"       =>'upload/'.$file_name,
            "u_last_lesson" => '0'
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
        $unit = units::where('u_id',$id)->get();
        return view('admin.unit.edit',[
            'unit'=>$unit
        ]);
    }

    public function updateUnit(Request $request)
    {
        $request->validate([
            'title'        =>'required', 
            
            'id'           =>'required'
        ]);
            
        if ($request->has('file')) {
            $request->validate(['file'=>'required|image']);
            $file_name = 'upload/'.$this->savePhoto($request->file , 'upload/');
        } else {
            $request->validate(['bg'=>'required']);
            $file_name = $request->bg;
        }
        $slider = units::where('u_id',$request->id)
                ->update([
                        "u_name"            =>$request->title,
                        "u_img"             =>$file_name
                    ]);

        if ($slider)
            return response()->json([
                "status"    => '1',
                "msg"       => 'Edit successfully'
            ]);
        else
            return response()->json([
                "status"    => '0',
                "msg"       => 'No changes to save'
            ]);
    }


    public function deleteUnit(Request $request)
    {
        $sliderDelete = units::where('u_id',$request->id)->delete();
        
       

             if ($sliderDelete)
            return redirect()->route('unit')->with([
                "status"    => '1',
                "msg"       => 'unit, deleted successfully'
            ]);
        else
            return  redirect()->route('unit')->with([
                "status"    => '0',
                "msg"       => 'Sorry, please try again'
            ]);
    }

}
