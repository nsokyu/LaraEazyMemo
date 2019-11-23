<?php

namespace App\Http\Controllers;

use App\User;
use App\Memo;
use Illuminate\Http\Request;

class MemosController extends Controller
{
    public function store(Request $request, User $users)
    {
        $this->validate($request, [
            'memo' => 'required'
        ]);
        $memo = new Memo();
        // $memo->user_id = $user->id;
        $memo->memo = $request->memo;
        $memo->importance = $request->importance;
        $memo->is_removed = 0;
        $users->memos()->save($memo);
        // $memo->save();
        // return view('users.main')->with('user', $user);
        return redirect()->action('UsersController@main', $users);
    }
}
