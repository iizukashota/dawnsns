@extends('layouts.login')

@section('content')
<div class="posts-create-container">
  <img class="icon-img" src="{{ asset('storage/icons/dawn.png')}}" alt="">

  {!! Form::open() !!}
  <div class="form-area">
    {{ Form::text('newPost',null,['wrap'=>'hard','class' => 'post-form','placeholder'=>'何をつぶやこうか...?']) }}
    <input class="create-button" type="image" src="{{ asset('storage/icons/post.png')}}">
  </div>
  {!! Form::close() !!}
</div>

<div class="users-posts-container">

  @foreach ($posts as $post)
  <div class="posts-frame">
    <img class="icon-img" src="storage/icons/{{$post->images}}" alt="">
    <div class="posts-frame2">
      <div class="posts-user-name">{{ $post->username}}</div>
      <p class="posts-post">{{ $post->posts }}</p>
    </div>
    <small class="posts-create-date">{{ $post->created_at }}</small>

    @if($user->id == $post->user_id)
    <div class="posts-update">
      <img class="modalopen" data-target="{{ $post->id }}" src="{{ asset('storage/icons/edit.png')}}" alt="">
    </div>

    <div class="modal" id="{{ $post->id }}">
      {!! Form::open(['url' => '/update']) !!}
      {!! Form::hidden('id', $post->id) !!}
      {{ Form::text('upPost',$post->posts,['class' => 'input']) }}
      <input class="modalclose" type="image" src="{{ asset('storage/icons/edit.png')}}">
      {!! Form::close() !!}
    </div>

    <div class="posts-delete">
      <a href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
        <img src="{{ asset('storage/icons/trash_h.png')}}" alt="削除">
      </a>
    </div>
    @endif

  </div>
  @endforeach


</div>
@endsection
