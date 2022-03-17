<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use App\Models\levels;


class LevelController extends Controller
{
  use PhotoTrait;

  public function index()
  {
     return view('admin.levels.index',[
       'levels'=> levels::all(),

     ]);
  }

  public function create()
  {
    return view('admin.levels.create');
  }

  public function store (Request $request)
  {
    $request->validate([
      'title'        =>'required',
      'file'         =>'required|image',
      'type'         =>'required',
      'section'         =>'required'
    ]);

    $file_name = $this->savePhoto($request->file , 'upload/');

    $slider = levels::create([
      "l_name"            =>$request->title,
      "l_img"       =>'upload/'.$file_name,
      "l_section"       =>$request->section,
      "l_is_free" => $request->type,

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
    $level = levels::where('l_id',$id)->get();
    return view('admin.levels.edit',[
      'level'=>$level
    ]);
  }

  public function updateLevel(Request $request)
  {
    $request->validate([
      'title'        =>'required',
      'bg'           =>'required',
      'section'           =>'required',
      'type'           =>'required',
      'id'           =>'required'
    ]);

    if ($request->has('file')) {
      $request->validate(['file'=>'required|image']);
      $file_name = 'upload/'.$this->savePhoto($request->file , 'upload/');
    } else {
      $file_name = $request->bg;
    }
    $slider = levels::where('l_id',$request->id)
      ->update([
        "l_name"            =>$request->title,
        "l_img"             =>$file_name,
        "l_section"             =>$request->section,
        "l_is_free"             =>$request->type
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


  public function deleteLevel(Request $request)
  {
    $sliderDelete = levels::where('l_id',$request->id)->delete();

      
      if ($sliderDelete)
            return redirect()->route('level')->with([
                "status"    => '1',
                "msg"       => 'Level, deleted successfully'
            ]);
        else
            return  redirect()->route('level')->with([
                "status"    => '0',
                "msg"       => 'Sorry, please try again'
            ]);
      
      
  }
}
