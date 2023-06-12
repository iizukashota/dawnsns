@extends('layouts.login')

@section('content')
<div class="search-container">
  {!! Form::open(['url' => 'search']) !!}
  {!! Form::input('text', 'keyword', null, ['class' => 'search-text', 'placeholder' => 'ユーザー名','size'=>'40']) !!}
  {{ Form::submit('検索') }}
  @if(!empty($keyword))
  <span>検索ワード：{{ $keyword }}</span>
  @endif
  {!! Form::close() !!}

</div>
<div class="searchLists-container">
  @foreach ($users as $user)
  <div class="searchLists-frame">
    <div class="search-icon">
      <img class="icon-img" src="storage/icons/{{ $user->images }}" alt="">
      <p>{{ $user->username }}</p>
    </div>
    <div class="search-followBtn">
      @if($followNumbers->contains($user->id))
      {!! Form::open(['url' => '/followRemove']) !!}
      {!! Form::hidden('followId', $user->id) !!}
      {!! Form::hidden('followerId',Auth::id()) !!}
      <div class="follow-removeBtn"> <input type="submit" value="フォローをはずす"></div>
      {!! Form::close() !!}

      @else
      {!! Form::open(['url' => '/followBtn']) !!}
      {!! Form::hidden('followId', $user->id) !!}
      {!! Form::hidden('followerId',Auth::id()) !!}
      <div class="follow-btn"><input type="submit" value="フォローする"></div>
      {!! Form::close() !!}
      @endif
    </div>
  </div>
  @endforeach
</div>

@endsection
