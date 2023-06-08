@extends('layouts.login')

@section('content')
<div>
  @foreach($follow_icons as $follow_icon)
  <a href="/follow/{{ $follow_icon->id }}"> {{ $follow_icon->id }}
    <img src="storage/icons/{{ $follow_icon->images }}" alt="">
  </a>
  @endforeach
</div>
<div>
  <table>
    @foreach($followLists as $followList)
    <tr>
      <th><img src="storage/icons/{{ $followList->images }}" alt=""></th>
      <th>{{$followList->username}}</th>
      <th>{{ $followList->posts}}</th>
      <th>{{$followList->created_at}}</th>
    </tr>
    @endforeach
  </table>
</div>


@endsection
