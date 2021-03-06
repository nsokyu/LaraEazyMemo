@extends('layouts.default')

@section('title', 'ホーム - LaraEazyMemo')

@section('content')

<div class="row">

    <div class="col-md-10 order-md-last">
        <div class="text-center mb-4">
            <img class="" src="picture/EazyMemo_logo.png" alt="" width="450" height="150">
            <h4>ようこそ {{ $user->name }}さん!</h4>
        </div>

        <div class="div-regulate">
            <form class="form-main" action="{{ route('memoInsert', [$user]) }}" method="post">
                @csrf
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
                </div>
                <button class="btn btn-md btn-success btn-block" type="submit" value="Add">保存</button>
            </form>
            <br>
            <br>
            <a class="btn btn-outline-primary" type="submit" href="{{ route('signout') }}">ログアウト</a>
        </div>
    </div>

    <div class="col-md-2 order-md-first">
        <br>
        <div class="list-group">
            <ul>
                @if (!isset( $errormessage ))
                @forelse ($memos as $memo)
                <a href="{{ route('memoShow', [$user, $memo]) }}" class="list-group-item d-flex justify-content-between align-items-center">{{ $memo->memo}}
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
                <h6>メモはまだありません。</h6>
                @endforelse
                @else
                <h6>{{ $errormessage }}</h6>
                @endif
            </ul>
        </div>
        @if (!isset( $errormessage ))
        <div class="text-center">
            {{ $memos->links() }}
        </div>
        @endif
    </div>


</div>
@endsection