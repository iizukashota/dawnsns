@extends('layouts.login')

@section('content')
<div class="profile-conteiner">
  <div class="profile-image">
    <img class="icon-img" src="{{ asset('storage/icons/'.$user->images) }}" alt="">
  </div>
  {!! Form::open(['url' => '/profileUpdate','files' => true]) !!}
  {!! Form::hidden('id',$user->id) !!}
  <table>
    <tr>
      <td>{{ Form::label('UserName') }}</td>
      <td>{{ Form::text('username', $user->username, ['class' => 'profile-form']) }}</td>
      @if($errors->has('username'))
      <td>{{ $errors->first('username') }}</td>
      @endif
    </tr>
    <tr>
      <td>{{Form::label('MailAdress')}}</td>
      <td>{{ Form::text('mail',$user->mail,['class' => 'profile-form']) }}
      </td>
      @if($errors->has('mail'))
      <td>{{ $errors->first('mail')}}</td>
      @endif
    </tr>
    <tr>
      <td>{{Form::label('PassWord')}}</td>
      <td> {{ Form::text('password',$session,['class' => 'profile-form']) }}</td>
    </tr>
    <tr>
      <td>{{Form::label('new PassWord')}}</td>
      <td> {{ Form::text('new_password',null,['class' => 'profile-form']) }}</td>
      @if($errors->has('new_password'))
      <td>{{ $errors->first('new_password')}}</td>
      @endif
    </tr>
    <tr>
      <td>{{Form::label('Bio')}}</td>
      <td> {{ Form::text('bio',$user->bio,['class' => 'profile-form']) }}</td>
      @if($errors->has('bio'))
      <td>{{ $errors->first('bio')}}</td>
      @endif
    </tr>
    <tr>
      <td>{{Form::label('Icon Image')}}</td>
      <td>{!! Form::file('image') !!}</td>
    </tr>
  </table>
  <div class="profile-submit">
    {{ Form::submit('更新') }}
  </div>
  {!! Form::close() !!}
</div>

@endsection
