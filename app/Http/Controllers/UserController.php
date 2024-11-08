<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function user() 
    {
        $users = User::get();
        $usersActiveCount = User::where('status', 1)->count();
        $usersInactiveCount = User::where('status', 0)->count();
        return view('user', compact('users'), ['usersActiveCount' => $usersActiveCount, 'usersInactiveCount' => $usersInactiveCount]);
    }

    public function user_store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        return ($user) ? back()->with('success', 'User Successfuly Added') :
                            back()->with('error', 'Something went wrong');
    }

    public function checkusername(Request $request)
    {
        $checkuser = User::where('username', request('username'))->first();

        if($checkuser) {
            return response()->json($checkuser);
        }
    }

    public function checkemail(Request $request)
    {
        $checkemail = User::where('email', request('email'))->first();

        if($checkemail) {
            return response()->json($checkemail);
        }
    }

    public function user_edit($id) 
    {
        $user = User::findOrFail($id);

        return view('edit.user', ['user' => $user]);
    }

    public function user_update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if(!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->status = $request->status;
        $user->save();

        return ($user) ? redirect('users')->with('success', 'User Updated') :
                            redirect('users')->with('error', 'Something went wrong');

    }

    public function user_delete($id, Request $request)
    {
        $user = User::where('id', $id)->delete();

        return response()->json($user);
    }
}
