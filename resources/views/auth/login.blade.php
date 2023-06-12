@extends('layouts.logout')

@section('content')
<div class="login-container">
  {!! Form::open() !!}
  <div class="login-frame">
    <p>DAWNSNSへようこそ</p>
    <div class="login-inner">
      <div class="login-label">{{ Form::label('e-mail') }}</div>
      <div class="login-value">{{ Form::text('mail',null,['class' => 'login-form','size'=>'30']) }}</div>
    </div>
    <div class="login-inner">
      <div class="login-label">{{ Form::label('password') }}</div>
      <div class="login-value">{{ Form::password('password',['class' => 'login-form','size'=>'30']) }}</div>
    </div>
    <div class="login-btn">
      {{ Form::submit('ログイン') }}
    </div>
    <div class="login-register">
      <a href="/register">新規ユーザーの方はこちら</a>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection
