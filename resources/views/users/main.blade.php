@extends('layouts.default')

@section('title', 'ホーム - LaraEazyMemo')

@section('content')

<div class="row">

    <div class="col-md-10 order-md-last">
        <div class="text-center mb-4">
            <img class="" src="picture/EazyMemo_logo.png" alt="" width="450" height="150">
            <h4>ようこそ {{ $users->name }}さん!</h4>
        </div>

        <div class="div-regulate">
            <form class="form-main" action="{{ action('MemosController@store', $users) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control" name="memo" value="{{ old('memo') }}" rows="10" cols="50" wrap="hard" placeholder="ここにメモを入力"></textarea><br>
                    @if ($errors->has('memo'))
                    <span class="error">{{ $errors->first('memo') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <select class="form-control" name="importance" value="{{ old('importance') }}">
                        <option value="0" selected="selected">優先度</option>
                        <option value="1">(優先度) 大</option>
                        <option value="2">(優先度) 中</option>
                        <option value="3">(優先度) 小</option>
                    </select><br>
                    @if ($errors->has('importance'))
                    <span class="error">{{ $errors->first('importance') }}</span>
                    @endif
                </div>
                <button class="btn btn-md btn-success btn-block" type="submit" value="Add">保存</button>
            </form>
            <br>
            <br>
            <button class="btn btn-outline-primary" type="submit" name="buttonSignOut" value="signOut" onclick="location.href='signout.php'">ログアウト</button>
        </div>
    </div>

    <div class="col-md-2 order-md-first">
        <div class="list-group">
            <ul>
                @forelse ($memos as $memo)
                <a href="" class="list-group-item d-flex justify-content-between align-items-center">{{ $memo->memo}}
                    <span class="badge badge-light badge-pill">
                        @switch($memo->importance)
                        @case(1)
                        大
                        @break
                        @case(2)
                        中
                        @break
                        @case(3)
                        小
                        @break
                        @default
                        -
                        @endswitch
                    </span>
                </a>
                <time class="memo_time">{{ $memo->updated_at }}</time>
                @empty
                <h3>まだメモはありません。</h3>
                @endforelse
            </ul>
        </div>
        <div class="text-center">
            {{ $memos->links() }}
        </div>
    </div>


</div>
@endsection