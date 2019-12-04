<?php

namespace App\Http\Controllers;

use App\User;
use App\Memo;
use Illuminate\Http\Request;
use App\Http\Requests\MemoRequest;

class MemosController extends Controller
{
    public function store(MemoRequest $request, User $user)
    {
        $memo = new Memo();
        // $memo->user_id = $user->id;
        $memo->memo = $request->memo;
        $memo->importance = $request->importance;
        $memo->is_removed = 0;
        $user->memos()->save($memo);
        // $memo->save();
        // return view('users.main')->with('user', $user);
        // return redirect()->action('UsersController@main', $users);
        return redirect()->route('main', $user->id);
    }

    public function show(User $user, Memo $memo)
    {
        $errormessage = null;

        // メモが存在しない場合
        if (false === Memo::where('id', '=', $memo->id)->exists()) {
            return redirect()->route('main', $user->id);
        }
        // メモがある場合、更新日時の昇順でページング
        $memos = Memo::where('user_id', '=', $user->id)->orderBy('updated_at', 'desc')->paginate(10);
        // return view('users.main', ['users' => $users]);
        return view('users.show', compact('user', 'memos', 'memo'));
    }

    public function update(MemoRequest $request, User $user, Memo $memo)
    {
        $memo->memo = $request->memo;
        $memo->importance = $request->importance;
        // $memo->is_removed = $request->is_removed;
        $memo->save();
        return redirect()->route('main', $user);
    }
}
