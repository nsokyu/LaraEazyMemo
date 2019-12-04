@extends('layouts.default')

@section('title', 'ログイン - LaraEazyMemo')

@section('content')

<div class="text-center mb-4">
    <img class="" src="/picture/EazyMemo_logo.png" alt="" width="300" height="100">
    <p>EazyMemoでは、ブラウザからあなただけのメモ帳が利用できます。</p>
</div>

<div class="div-regulate-signin">
    @if (isset( $errormessage ))
    <p>{{ $errormessage }}</p>
    @endif

    <form class="form-signin" action="{{ url('/') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="メールアドレス" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
            <span class="error">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="パスワード" value="" required>
            @if ($errors->has('passsword'))
            <span class="error">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-signin-button">
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="buttonSignIn" value="signIn">ログイン</button>
        </div>
    </form>
    <br>
    <a class="btn btn-outline-primary" type="submit" href="{{ route('signup') }}">ユーザ登録</a>
    <form class="form-Experience" action="index.php" method="post">
        <button class="btn btn-outline-primary" type="submit" name="buttonExperience" value="Experience">すぐに体験する</button>
    </form>
</div>
@endsection