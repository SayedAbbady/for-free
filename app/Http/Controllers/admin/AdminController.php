<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class AdminController extends Controller
{

    public function index() 
    {
        $user = User::where('role','1')->get();
        return view('admin.staff.indexstaff',[
            'users'=>$user
        ]);
    }

    public function add() 
    {
        return view('admin.staff.create');
    }

    public function store(Request $request) 
    {
       
        $request->validate([
            'name'         =>'required', 
            'email'         =>'required',    
            'password'   =>'required',
            'role'   =>'required'
        ]);
            
        $newUser = User::where('email', $request->email)->count();
        if ($newUser < '1') {
        
            $addNew = User::create([
                "name"              =>$request->name,
                "email"              =>$request->email,
                "password"           =>HASH::make($request->password),
                "role"           =>$request->role,
                
            ]);
            if($addNew)
                return response()->json([
                    "status"    => '1',
                    "msg"       => 'Added successfully'
                ]);
            else
                return response()->json([
                    "status"    => '0',
                    "msg"       => 'something is wrong'
                ]);
        } else {
            return response()->json([
                "status"    => '0',
                "msg"       => 'Sorry, this user is exist'
            ]);
            // return 'dfadf';
        }

        
            
    }

    public function edit($id) 
    {
        $user = User::where('id',$id)->get();
        return view('admin.staff.edit',[
            'user' => $user
        ]);
    }

    public function staffUpdata(Request $request)
    {
        $request->validate([
            'name'         =>'required', 
            'email'         =>'required',
        ]);
        if($request->has('password')){
            $password = Hash::make($request->password);
        } else {
            $password = $request->oldpassword;
        }

        
        $slider = User::where('id',$request->id)
                ->update([
                        "name"      =>$request->name,
                        "email"      =>$request->email,
                        "password"   =>$password
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

    public function deletestaff(Request $request)
    {
         $sliderDelete = User::where('id',$request->id)->delete();
        
        if ($sliderDelete)
            return redirect()->route('staff')->with([
                "status"    => '1',
                "msg"       => 'Deleted successfully'
            ]);
        else
            return redirect()->route('staff')->with([
                "status"    => '0',
                "msg"       => 'Sorry, please try again'
            ]);
    }


    // user (students)
    public function user()
    {
        $user = User::where('role','0')->get();
        return view('admin.staff.indexuser',[
            'users'=>$user
        ]);
    }
    public function deleteuser(Request $request)
    {
         $sliderDelete = User::where('id',$request->id)->delete();
        
        if ($sliderDelete)
            return redirect()->route('student')->with([
                "status"    => '1',
                "msg"       => 'Deleted successfully'
            ]);
        else
            return redirect()->route('student')->with([
                "status"    => '0',
                "msg"       => 'Sorry, please try again'
            ]);
    }
}
