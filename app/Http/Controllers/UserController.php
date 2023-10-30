<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\School;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->get();
        return view("user.index",compact("users"));
    }
    public function all()
    {
        $teacher = User::where('role', 'teacher')->get();
        $HOD_user = User::where('role', 'HOD')->get();
        $userCount = $teacher->count();
        $videoCount = Video::count();
        $hod= $HOD_user->count();

        return view('home', [ 'teacher' => $userCount,'hod'=>$hod, 'videoCount' => $videoCount]);
    }

    public function create(Request $request){
        User::create($request->all());
        return redirect()->back()->with("success","User creatted");
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->lname = $request->lname;
        $user->contact = $request->contact;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with("success","User updated");
    }
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with("success","User removed successfully!");
    }
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
