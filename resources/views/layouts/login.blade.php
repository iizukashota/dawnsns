<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

<body>
    <header id="header">
        <div class="logo-area">
            <a href="/top"><img src="{{ asset('storage/icons/main_logo.png') }}"></a>
        </div>
        <div class="menu-area">
            <p>{{ Auth::user()->username }}さん</p>
            <div class="accordion-button"></div>
            <div class="accordion-area">
                <ul class="accordion-menu">
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール</a></li>
                    <li><a href="/logout" onclick="return confirm('ログアウトしますか？')">ログアウト</a></li>
                </ul>
            </div>
            <img class="icon-img" src=" {{ asset('storage/icons/'.$user->images) }}">
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div class="follow-counts">
                    <p>フォロー数</p>
                    <p>{{$follow_counts}}名</p>
                </div>
                <div class="btn"><a href="/follow-list">フォローリスト</a></div>
                <div class="follower-counts">
                    <p>フォロワー数</p>
                    <p>{{$follower_counts}}名</p>
                </div>
                <div class="btn"><a href="/follower-list">フォロワーリスト</a></div>
            </div>
            <p class="search-btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/script.js"></script>

</body>

</html>
