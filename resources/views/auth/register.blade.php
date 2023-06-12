@extends('layouts.logout')

@section('content')


<div class="register-container">
  {!! Form::open() !!}
  <h2>新規ユーザー登録</h2>

  <div>
    <p>ユーザー名</p>
    <span> {{ Form::text('username',null,['class' => 'input']) }}</span>
    @error('username')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
  </div>
  <div>
    <p>メールアドレス</p>
    <span> {{ Form::text('mail',null,['class' => 'input']) }}</span>
    @error('mail')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
  </div>
  <div>
    <p>パスワード</p>
    <span>{{ Form::text('password',null,['class' => 'input']) }}</span>
    @error('password')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
  </div>
  <div>
    <p>パスワード確認</p>
    <span>{{ Form::text('password_confirmation',null,['class' => 'input']) }}</span>
    @error('password_confirmation')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
  </div>
  <span>
    {{ Form::submit('登録') }}
  </span>

  <p><a href="/login">ログイン画面へ戻る</a></p>

  {!! Form::close() !!}
</div>

@endsection
