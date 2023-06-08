@extends('layouts.login')

@section('content')
<div class="othersProfile">
  <dl>
    <dt><img src="{{ asset('storage/icons/'. $otherProfile->images)}}"></dt>
    <dt>Name</dt>
    <dd>{{ $otherProfile->username }}</dd>
    <dt>Bio</dt>
    <dd>{{ $otherProfile->bio}}</dd>
  </dl>
  @if($otherfollowNumbers->contains($otherProfile->id))
  {!! Form::open(['url' => '/followRemove']) !!}
  {!! Form::hidden('followId', $otherProfile->id) !!}
  {!! Form::hidden('followerId',Auth::id()) !!}
  <div> <input type="submit" value="フォローをはずす"></div>
  {!! Form::close() !!}
  @else
  {!! Form::open(['url' => '/followBtn']) !!}
  {!! Form::hidden('followId', $otherProfile->id) !!}
  {!! Form::hidden('followerId',Auth::id()) !!}
  <div><input type="submit" value="フォローする"></div>
  {!! Form::close() !!}
  @endif
</div>

<div>
  @foreach ($otherPosts as $otherPost)
  <table>
    <tr>
      <td><img src="{{ asset('storage/icons/'. $otherPost->images)}}"></td>
      <td>{{ $otherPost->username }}</td>
      <td>{{ $otherPost->posts }}</td>
      <td>{{ $otherPost->created_at }}</td>
    </tr>
  </table>
  @endforeach
</div>



@endsection
