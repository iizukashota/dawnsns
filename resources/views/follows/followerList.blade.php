@extends('layouts.login')

@section('content')
<div class="followerLists">
  <h2 class="follower-title">Follower list</h2>
  <div class="followerLists-frame">
    @foreach($follower_icons as $follower_icon)
    <a href="/follower/{{ $follower_icon->id }}">
      <img class="icon-img" src="storage/icons/{{ $follower_icon->images }}" alt="">
    </a>
    @endforeach
  </div>
</div>
<div class="follower-posts-container">
  @foreach($followerLists as $followerList)
  <div class="follower-posts-frame">
    <img class="icon-img" src="storage/icons/{{ $followerList->images }}" alt="">
    <div class="follower-posts-frame2">
      <div class="follower-username">{{$followerList->username}}</div>
      <p class="follower-posts">{{$followerList->posts}}</p>
    </div>
    <small class="follower-create-date">{{$followerList->created_at}}</small>
  </div>
  @endforeach
</div>
@endsection
