@extends('layouts.login')

@section('content')
<div>
  @foreach($follower_icons as $follower_icon)
  <a href="/follower/{{ $follower_icon->id }}"> {{ $follower_icon->id }}
    <img src="storage/icons/{{ $follower_icon->images }}" alt="">
  </a>
  @endforeach
</div>
<div>
  <table>
    @foreach($followerLists as $followerList)
    <tr>
      <th><img src="storage/icons/{{ $followerList->images }}" alt=""></th>
      <th>{{$followerList->username}}</th>
      <th>{{$followerList->posts}}</th>
      <th>{{$followerList->created_at}}</th>
    </tr>
    @endforeach
  </table>
</div>
@endsection
