@extends('layouts.default')

@section('title', '編集 - LaraEazyMemo')

@section('content')

<div class="row">

    <div class="col-md-10 order-md-last">
        <div class="text-center mb-4">
            <img class="" src="picture/EazyMemo_logo.png" alt="" width="450" height="150">
            <h4>メモの編集</h4>
        </div>

        <div class="div-regulate">
            <form class="form-main" action="{{ route('memoUpdate', [$user, $memo]) }}" method="post">
                @csrf
                <div class="form-group">
                <textarea class="form-control" name="memo" rows="10" cols="50" wrap="hard" value="{{ old('memo') }}" placeholder="ここにメモを入力">{{ $memo->memo}}</textarea><br>
                    @if ($errors->has('memo'))
                    <span class="error">{{ $errors->first('memo') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <select class="form-control" name="importance" value="{{ old('importance') }}">
                        @switch($memo->importance)
                        @case(0)
                        <option value="0" selected="selected">優先度</option>
                        <option value="1">(優先度) 大</option>
                        <option value="2">(優先度) 中</option>
                        <option value="3">(優先度) 小</option>
                        @break
                        @case(1)
                        <option value="0">優先度</option>
                        <option value="1" selected="selected">(優先度) 大</option>
                        <option value="2">(優先度) 中</option>
                        <option value="3">(優先度) 小</option>
                        @break
                        @case(2)
                        <option value="0">優先度</option>
                        <option value="1">(優先度) 大</option>
                        <option value="2" selected="selected">(優先度) 中</option>
                        <option value="3">(優先度) 小</option>
                        @break
                        @case(3)
                        <option value="0">優先度</option>
                        <option value="1">(優先度) 大</option>
                        <option value="2">(優先度) 中</option>
                        <option value="3" selected="selected">(優先度) 小</option>
                        @break
                        @endswitch
                    </select>
                    <br>
                </div>
                <button class="btn btn-md btn-success btn-block" type="submit" value="Add">保存</button>
            </form>
            <br>
            <a class="btn btn-outline-primary" type="submit" href="{{ route('main', $user) }}">メニュー</a>
            <br>
            <br>
            <a href="#" class="del" data-id="{{ $memo->id }}">[メモを削除]</a>
            <form method="post" action="{{ route('memoDelete', [$user, $memo]) }}" id="form_{{ $memo->id }}">
                    @csrf
                    @method('delete')
            </form>        
            <br>
            <a class="btn btn-outline-primary" type="submit" href="{{ route('signout') }}">ログアウト</a>
        </div>
    </div>

    <div class="col-md-2 order-md-first">
        <div class="list-group">
            <br>
            <ul>
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
            </ul>
        </div>
        <div class="text-center">
            {{ $memos->links() }}
        </div>
    </div>


</div>
<script src="/js/main.js"></script>
@endsection