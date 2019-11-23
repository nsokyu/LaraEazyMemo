<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Memo;

class UsersController extends Controller
{
    //
    public function index()
    {
        return view('users.index');
    }

    // public function main($users) {
    //     // $user = User::where('id','=',$users);
    //     $users = User::find($users);
    //     // return view('users.main', ['users' => $users]);
    //     return view('users.main', compact('users'));
    //     // Viewの中で'users'を使える
    // }

    public function create(UserRequest $request)
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        // $users->password = $request->password;
        $users->password = Hash::make($request->password);
        $users->save();
        return redirect('/');
    }
    
    public function signup()
    {
        return view('users.signup');
    }
    
    // public function signin(Request $request)
    // {
    //     $user = User::where('email','=',$request->email)->findOrFail();
    //     if (Hash::check($request->password, $user->password){
    //         return
    //     }
    //     return redirect('/');
    // }
    
    public function main($users)
    {
        // $user = User::where('id','=',$users);
        $users = User::find($users);
        $memos = Memo::where('user_id', '=', $users->id)->orderBy('updated_at', 'desc')->paginate(10);
        // return view('users.main', ['users' => $users]);
        return view('users.main', compact('users', 'memos'));
        // Viewの中で'users'を使える
    }
}
