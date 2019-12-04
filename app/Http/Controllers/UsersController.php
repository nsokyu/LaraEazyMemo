<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Memo;

class UsersController extends Controller
{
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


    public function main(User $user, Request $request)
    {
        $errormessage = null;
        $memos = "";

        // セッションが切れている場合、ログアウト処理
        if (false === $request->session()->has('user_id')) {
            return redirect('/');
        }

        // $user_id = $request->session()->get('user_id');
        // $user = User::where('id','=',$user_id)->first();

        // メモがない場合、エラーメッセージをセット
        // if (false === DB::table('memos')->where('user_id','=', $$user_id)->exists()){
        // if (false === Memo::where('user_id', '=', $user_id)->exists()){
        if (false === Memo::where('user_id', '=', $user->id)->exists()) {
            $errormessage = "メモはまだありません。";
            return view('users.main', compact('user', 'errormessage'));
        }

        //メモがある場合、更新日時の昇順でページング
        $memos = Memo::where('user_id', '=', $user->id)->orderBy('updated_at', 'desc')->paginate(10);
        // return view('users.main', ['users' => $users]);
        return view('users.main', compact('user', 'memos', 'errormessage'));
    }

    public function signout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
