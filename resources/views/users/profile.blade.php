@extends('layouts.login')

@section('content')
<div class="profile-conteiner">
  <div class="profile-image">
    <img class="icon-img" src="{{ asset('storage/icons/'.$user->images) }}" alt="">
  </div>
  <div class="profile-frame">
    {!! Form::open(['url' => '/profileUpdate','files' => true]) !!}
    {!! Form::hidden('id',$user->id) !!}
    <div class="profile-inner">
      <div class="profile-inner-row">
        <div class="profile-label">{{ Form::label('UserName') }}</div>
        <div class="profile-value">{{ Form::text('username', $user->username, ['class' => 'profile-form','size'=>'30']) }}</div>
        @if($errors->has('username'))
        <div>{{ $errors->first('username') }}</div>
        @endif
      </div>
      <div class="profile-inner-row">
        <div class="profile-label">{{Form::label('MailAdress')}}</div>
        <div class="profile-value">{{ Form::text('mail',$user->mail,['class' => 'profile-form','size'=>'30']) }}
        </div>
        @if($errors->has('mail'))
        <div>{{ $errors->first('mail')}}</div>
        @endif
      </div>
      <div class="profile-inner-row">
        <div class="profile-label">{{Form::label('PassWord')}}</div>
        <div class="profile-value">{{ Form::text('password',$session,['class' => 'profile-form','size'=>'30']) }}</div>
      </div>
      <div class="profile-inner-row">
        <div class="profile-label">{{Form::label('new PassWord')}}</div>
        <div class="profile-value">{{ Form::text('new_password',null,['class' => 'profile-form','size'=>'30']) }}</div>
        @if($errors->has('new_password'))
        <div>{{ $errors->first('new_password')}}</div>
        @endif
      </div>
      <div class="profile-inner-row">
        <div class="profile-label">{{Form::label('Bio')}}</div>
        <div class="profile-value">{{ Form::text('bio',$user->bio,['class' => 'profile-form','id'=>'profile-bio','size'=>'30']) }}</div>
        @if($errors->has('bio'))
        <div>{{ $errors->first('bio')}}</div>
        @endif
      </div>
      <div class="profile-inner-row">
        <div class="profile-label">{{Form::label('Icon Image')}}</div>
        <div class="profile-value">{!! Form::file('image',['class' => 'profile-form','id'=>'profile-image']) !!}</div>
      </div>
    </div>
    <div class="profile-submit">
      {{ Form::submit('更新',['class'=>'profile-submitBtn']) }}
    </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection
