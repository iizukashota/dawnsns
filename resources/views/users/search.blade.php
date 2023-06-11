@extends('layouts.login')

@section('content')
<div class="search-area">
  {!! Form::open(['url' => 'search']) !!}
  {!! Form::input('text', 'keyword', null, ['class' => 'search-text', 'placeholder' => 'ユーザー名']) !!}
  {{ Form::submit('検索') }}
  @if(!empty($keyword))
  <span>検索ワード：{{ $keyword }}</span>
  @endif
  {!! Form::close() !!}

</div>
<table class="search-lists">
  @foreach ($users as $user)
  <tr>
    <th class="search-icon">
      <img class="icon-img" src="storage/icons/{{ $user->images }}" alt="">
      <p>{{ $user->username }}</p>
    </th>
    @if($followNumbers->contains($user->id))
    {!! Form::open(['url' => '/followRemove']) !!}
    {!! Form::hidden('followId', $user->id) !!}
    {!! Form::hidden('followerId',Auth::id()) !!}
    <td class="follow-removeBtn"> <input type="submit" value="フォローをはずす"></td>
    {!! Form::close() !!}

    @else
    {!! Form::open(['url' => '/followBtn']) !!}
    {!! Form::hidden('followId', $user->id) !!}
    {!! Form::hidden('followerId',Auth::id()) !!}
    <td class="follow-btn"><input type="submit" value="フォローする"></td>
    {!! Form::close() !!}
    @endif
  </tr>
  @endforeach
</table>

@endsection
