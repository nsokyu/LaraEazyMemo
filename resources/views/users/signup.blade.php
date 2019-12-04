@extends('layouts.default')

@section('title', 'ユーザ登録 - LaraEazyMemo')

@section('content')

<div class="text-center mb-4">
    <img class="" src="/picture/EazyMemo_logo.png" alt="" width="300" height="100">
    <h3>EazyMemoへようこそ!</h3>
    <p>新規登録(無料)して利用を開始しましょう。</p>
</div>

<form class="form-signup" action="{{ url('/signup') }}" method="post">
    @csrf
    <div class="form-group">
        <label class="SignupForm_label" for="username">ユーザ名</label>
        <input type="text" name="name" class="form-control" id="username" placeholder="eazymemo" value="{{ old('name') }}">
        @if ($errors->has('name'))
        <span class="error">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label class="SignupForm_label" for="mailaddress">メールアドレス</label>
        <input type="email" name="email" class="form-control" id="mailaddress" placeholder="eazymemo@memo.com" value="{{ old('email') }}">
        @if ($errors->has('email'))
        <span class="error">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label class="SignupForm_label" for="password">パスワード</label>
        <label class="text-mini"> ※8文字以上、英・数・記号が使えます</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="********">
        @if ($errors->has('password'))
        <span class="error">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <br>
    <p><button class="btn btn-lg btn-primary btn-block" type="submit" name="buttonSignUp" value="signUp">登録</button></p>
</form>
</div>
@endsection