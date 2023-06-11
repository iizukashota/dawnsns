@extends('layouts.login')

@section('content')
<div class="followLists">
  <h2 class="follow-title">Follow list</h2>
  <div class="followLists-frame">
    @foreach($follow_icons as $follow_icon)
    <a href="/follow/{{ $follow_icon->id }}">
      <img class="icon-img" src="storage/icons/{{ $follow_icon->images }}" alt="">
    </a>
    @endforeach
  </div>
</div>
<div class="follow-posts-container">
  @foreach($followLists as $followList)
  <div class="follow-posts-frame">
    <img class="icon-img" src="storage/icons/{{ $followList->images }}" alt="">
    <div class="follow-posts-frame2">
      <div class="follow-username">{{$followList->username}}</div>
      <p class="follow-posts">{{ $followList->posts}}</p>
    </div>
    <small class="follow-create-date">{{$followList->created_at}}</small>
  </div>
  @endforeach
</div>


@endsection
