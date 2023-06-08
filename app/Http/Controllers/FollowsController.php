<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followList()
    {
        $follow_counts = DB::table('follows')
            ->where('follower', Auth::id())
            ->count();
        $follower_counts = DB::table('follows')
            ->where('follow', Auth::id())
            ->count();

        $user = Auth::user();

        $follow_ids = DB::table('follows')
            ->where('follower', Auth::id())
            ->pluck('follow');

        $follow_icons = DB::table('users')
            ->whereIn('id', $follow_ids)
            ->select('id', 'images')
            ->get();

        $followLists = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->whereIn('posts.user_id', $follow_ids)
            // ->orwhere('posts.user_id', Auth::id())
            ->select('users.images', 'users.username', 'posts.user_id', 'posts.posts', 'posts.created_at as created_at')
            ->get();

        return view('follows.followList', [
            'follow_ids' => $follow_ids,
            'followLists' => $followLists,
            'follow_icons' => $follow_icons,
            'user' => $user,
            'follow_counts' => $follow_counts,
            'follower_counts' => $follower_counts
        ]);
    }


    public function followerList()
    {
        $user = Auth::user();

        $follow_counts = DB::table('follows')
            ->where('follower', Auth::id())
            ->count();
        $follower_counts = DB::table('follows')
            ->where('follow', Auth::id())
            ->count();

        $follower_ids = DB::table('follows')
            ->where('follow', Auth::id())
            ->pluck('follower');

        $follower_icons = DB::table('users')
            ->whereIn('id', $follower_ids)
            ->select('id', 'images')
            ->get();

        $followerLists = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->whereIn('posts.user_id', $follower_ids)
            // ->orwhere('posts.user_id', Auth::id())
            ->select('users.images', 'users.username', 'posts.posts', 'posts.created_at as created_at')
            ->get();

        return view('follows.followerList', [
            'followerLists' => $followerLists, 'follower_icons' => $follower_icons,
            'user' => $user,
            'follow_counts' => $follow_counts,
            'follower_counts' => $follower_counts
        ]);
    }
}
