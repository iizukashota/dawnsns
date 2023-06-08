@extends('layouts.logout')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div>
  {!! Form::open() !!}
  <h2>新規ユーザー登録</h2>

  <div>
    <p>ユーザー名</p>
    <span> {{ Form::text('username',null,['class' => 'input']) }}</span>
  </div>
  <div>
    <p>メールアドレス</p>
    <span> {{ Form::text('mail',null,['class' => 'input']) }}</span>
  </div>
  <div>
    <p>パスワード</p>
    <span>{{ Form::text('password',null,['class' => 'input']) }}</span>
  </div>
  <div>
    <p>パスワード確認</p>
    <span>{{ Form::text('password_confirmation',null,['class' => 'input']) }}</span>
  </div>
  <span>
    {{ Form::submit('登録') }}
  </span>

  <p><a href="/login">ログイン画面へ戻る</a></p>

  {!! Form::close() !!}
</div>

@endsection
