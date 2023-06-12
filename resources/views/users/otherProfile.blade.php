@extends('layouts.login')

@section('content')
<div class="othersProfile-container">
  <div class="othersProfile-frame">
    <img class="icon-img" src="{{ asset('storage/icons/'. $otherProfile->images)}}">
    <div class="otherProfile-inner">
      <div class="otherProfile-inner-row">
        <div class="otherProfile-label">Name</div>
        <div class="otherProfile-value">{{ $otherProfile->username }}</div>
      </div>
      <div class="otherProfile-inner-row">
        <div class="otherProfile-label">Bio</div>
        <div class="otherProfile-value">{{ $otherProfile->bio}}</div>
      </div>
    </div>
  </div>
  <div class="otherProfile-btn">
    @if($otherfollowNumbers->contains($otherProfile->id))
    {!! Form::open(['url' => '/followRemove']) !!}
    {!! Form::hidden('followId', $otherProfile->id) !!}
    {!! Form::hidden('followerId',Auth::id()) !!}
    <div class="follow-removeBtn"> <input type="submit" value="フォローをはずす"></div>
    {!! Form::close() !!}
    @else
    {!! Form::open(['url' => '/followBtn']) !!}
    {!! Form::hidden('followId', $otherProfile->id) !!}
    {!! Form::hidden('followerId',Auth::id()) !!}
    <div class="follow-btn"><input type="submit" value="フォローする"></div>
    {!! Form::close() !!}
    @endif
  </div>
</div>

<div class="otherPosts-container">
  @foreach ($otherPosts as $otherPost)
  <div class="otherPosts-frame">
    <img class="icon-img" src="{{ asset('storage/icons/'. $otherPost->images)}}">
    <div class="otherPosts-inner">
      <div class="otherPosts-username">{{ $otherPost->username }}</div>
      <p>{{ $otherPost->posts }}</p>
    </div>
    <small class="otherPosts-create-date">{{ $otherPost->created_at }}</small>
  </div>
  @endforeach
</div>
@endsection
