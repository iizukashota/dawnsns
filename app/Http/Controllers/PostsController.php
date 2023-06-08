<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class PostsController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $follow_counts = DB::table('follows')
            ->where('follower', Auth::id())
            ->count();
        $follower_counts = DB::table('follows')
            ->where('follow', Auth::id())
            ->count();

        $posts = DB::table('posts')
            ->leftjoin('users', 'posts.user_id', '=', 'users.id')
            ->where('users.id', Auth::id())
            ->orWhere('users.id', '<>', Auth::id())
            ->select('users.images', 'users.username', 'posts.posts', 'posts.id', 'posts.user_id', 'posts.created_at as created_at')
            ->get();


        return view('posts.index', ['posts' => $posts, 'user' => $user, 'follow_counts' => $follow_counts, 'follower_counts' => $follower_counts]);
    }

    public function create(Request $request)
    {
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'user_id' => Auth::id(),
            'posts' => $post,
            'created_at' => now(),
        ]);
        return redirect('/top');
    }
    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $up_post]
            );

        return redirect('/top');
    }
}
