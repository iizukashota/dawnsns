<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    //
    public function profile()
    {

        return view('users.profile');
    }
    public function profileLists(Request $request)
    {
        $follow_counts = DB::table('follows')
            ->where('follower', Auth::id())
            ->count();
        $follower_counts = DB::table('follows')
            ->where('follow', Auth::id())
            ->count();

        $user = Auth::user();
        $session = $request->session()->get('pass');

        return view('users.profile', [
            'user' => $user, 'session' => $session, 'follow_counts' => $follow_counts,
            'follower_counts' => $follower_counts
        ]);
    }

    public function profileUpdate(Request $request)
    {

        $auth_mail = Auth::user()->mail;
        $request->validate(
            [
                'username' => ['required', 'string', 'min:4', 'max:12'],
                'mail' => ['required', 'email', 'min:4', 'max:20', Rule::unique('users', 'mail')->ignore($auth_mail, 'mail')],
                'new_password' => ['nullable', 'min:4', 'max:12'],
                'bio' => ['nullable', 'string', 'max:200'],
                'images' => ['nullable', 'image']
            ],
            [
                'username.required' => 'ユーザー名は必須項目です。',
                'username.min' => 'ユーザー名は4文字以上で入力してください。',
                'username.max' => 'ユーザー名は12文字以内で入力してください。',
                'mail.required' => 'メールアドレスは必須項目です。',
                'mail.email' => 'メールアドレスが有効ではありません。',
                'mail.min' => 'メールアドレスは4文字以上で入力してください。',
                'mail.max' => 'メールアドレスは20文字以内で入力してください。',
                'mail.unique' => 'このメールアドレスは既に登録されています。',
                'bio.max' => '自己紹介は200文字以内で入力してください。',
                'new_password.min' => 'パスワードは4文字以上で入力してください。',
                'new_password.max' => 'パスワードは12文字以上で入力してください。'

            ]
        );


        $user = Auth::user();
        $username = $request->input('username');
        $mail = $request->input('mail');
        $bio = $request->input('bio');
        $pass = $request->input('new_password');

        if (request('new_password')) {
            $new_password = bcrypt($request->new_password);
        } else {
            $new_password = DB::table('users')
                ->where('id', Auth::id())
                ->value('password');
        }

        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/icons', $fileName); // 画像をstorage/app/public/ディレクトリ内のimagesディレクトリに保存する
        } else {
            $fileName = DB::table('users')
                ->where('id', Auth::id())
                ->value('images');
        }

        // ここで全てを保存している
        DB::table('users')
            ->where('id', Auth::id())
            ->update([
                'username' => $username,
                'mail' => $mail,
                'password' => $new_password,
                'bio' => $bio,
                'images' => $fileName,
            ]);

        $hiddenPass = str_repeat('*', strlen($pass));
        $request->session()->put('pass', $hiddenPass);
        return back();

        // return view('users.profile', ['user' => $user, 'fileName' => $fileName]);
    }

    public function otherProfile($id)
    {
        $follow_counts = DB::table('follows')
            ->where('follower', Auth::id())
            ->count();
        $follower_counts = DB::table('follows')
            ->where('follow', Auth::id())
            ->count();

        $user = Auth::user();
        $otherProfile = DB::table('users')
            ->where('id', $id)
            ->first();

        $otherLists = DB::table('users')
            ->where('id', $id)
            ->get();

        $other_ids = DB::table('follows')
            ->where('follower', Auth::id())
            ->pluck('follow');

        $other_icons = DB::table('users')
            ->whereIn('id', $other_ids)
            ->select('id', 'images')
            ->get();

        $otherPosts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.user_id', $id)
            ->select('users.images', 'users.username', 'posts.posts', 'posts.created_at as created_at')
            ->get();
        $otherfollowNumbers = DB::table('follows')
            ->where('follower', [Auth::id()])
            ->pluck('follow');

        return view('users.otherProfile', [
            'user' => $user,

            'otherProfile' => $otherProfile,
            'otherLists' => $otherLists,
            'other_icons' => $other_icons,
            'otherPosts' => $otherPosts,
            'otherfollowNumbers' => $otherfollowNumbers,
            'follow_counts' => $follow_counts,
            'follower_counts' => $follower_counts
        ]);
    }

    //ユーザーテーブルのリスト表示と検索機能
    public function search(Request $request)
    {
        $follow_counts = DB::table('follows')
            ->where('follower', Auth::id())
            ->count();
        $follower_counts = DB::table('follows')
            ->where('follow', Auth::id())
            ->count();

        $user = Auth::user();
        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
            $users = DB::table('users')
                ->where('username', 'like', '%' . $keyword . '%')
                ->whereNotIn('id', [Auth::id()])
                ->get();
        } else {
            $users = DB::table('users')
                ->whereNotIn('id', [Auth::id()])
                ->get();
        }

        $followNumbers = DB::table('follows')
            ->where('follower', [Auth::id()])
            ->pluck('follow');
        return view('users.search', [
            'users' => $users,
            'followNumbers' => $followNumbers,
            'user' => $user,
            'follow_counts' => $follow_counts,
            'follower_counts' => $follower_counts
        ]);
    }
    //フォローテーブルへの登録機能
    public function followBtn(Request $request)
    {

        $followId = $request->input('followId');
        $followerId = $request->input('followerId');
        // $id = $request->input('id');
        // $follower_id = Auth::id();
        DB::table('follows')->insert([
            'follow' => $followId,
            'follower' => $followerId,
        ]);
        return back();
    }
    //フォローテーブルに登録したレコードの削除機能
    public function followRemove(Request $request)
    {

        $followId = $request->input('followId');
        $followerId = $request->input('followerId');

        DB::table('follows')
            ->where('follow', $followId)
            ->where('follower', $followerId)
            ->delete();
        return back();
    }
}
