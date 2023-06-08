@extends('layouts.login')

@section('content')
<div class="post-container">
  <img class="post-image" src="{{ asset('storage/icons/dawn.png')}}" alt="">

  {!! Form::open() !!}
  {{ Form::text('newPost',null,['class' => 'post-form','placeholder'=>'何をつぶやこうか...?']) }}
  <span class="form-btn">
    <button class="post-button" type="submit">
      <img src="{{ asset('storage/icons/post.png')}}" alt="">
    </button>
  </span>
  {!! Form::close() !!}

</div>
<div class="users-posts-container">
  <table class="posts-table">
    @foreach ($posts as $post)
    <tr>
      <th class="posts-table-image"><img src="storage/icons/{{$post->images}}" alt=""></th>
      <th class="posts-table-name">{{ $post->username}}</th>
      <th class="posts-table-post">{{ $post->posts }}</th>
      <th class="posts-table-date">{{ $post->created_at }}</th>

      @if($user->id == $post->user_id)
      <th>
        <img class="modalopen" data-target="{{ $post->id }}" src="{{ asset('storage/icons/edit.png')}}" alt="">

        <div class="modal" id="{{ $post->id }}">
          {!! Form::open(['url' => '/update']) !!}
          {!! Form::hidden('id', $post->id) !!}
          {{ Form::text('upPost',$post->posts,['class' => 'input']) }}
          <button class="modalclose" type=" submit">
            <img src="{{ asset('storage/icons/edit.png')}}" alt="">
          </button>
          {!! Form::close() !!}
        </div>

      </th>
      <th><a href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="{{ asset('storage/icons/trash_h.png')}}" alt="削除"></a></th>
      @else
      <th></th>
      <th></th>
      @endif

    </tr>
    @endforeach
  </table>
</div>
@endsection
