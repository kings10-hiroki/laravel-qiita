<nav class="navbar navbar-expand-lg navbar-light pl-5 pr-5 pt-2 pb-2">
    <a class="navbar-brand text-white" href="/">Qiita風</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Navber" aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーションの切替">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="Navber">
        <ul class="navbar-nav">
            <li class="nav-item ml-2">
                <a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ホーム</a>
            </li>
            <li class="nav-item ml-2">
                <a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">コミュニティ</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 ml-2" action="{{ route('search') }}" method="GET">
            @csrf
            <input type="search" class="form-control mr-sm-2" name="search" placeholder="キーワードを入力">
            <button type="submit" class="text-white search-btn"><i class="fas fa-search"></i>検索</button>
        </form>

        <ul class="navbar-nav ml-auto mr-5">
        @if (Auth::check())
            <li class="nav-item ml-2">
                <a href="#" class="nav-link text-white">ストック一覧</a>
            </li>
            <li class="nav-item ml-2">
                <a class="nav-link text-white" id="post-link" href="/drafts/new">
                    <i class="fas fa-edit"></i>投稿する
                </a>
            </li>
            <li class="nav-item ml-2">
                <a href="#" class="nav-link text-white">0</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">アイコン</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">マイページ</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">下書き一覧</a>
                    <a class="dropdown-item" href="#">編集リクエスト一覧</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">設定</a>
                    <a class="dropdown-item" href="#">ヘルプ</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        ログアウト
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @else
            <li class="nav-item ml-2">
                <a class="nav-link text-white" id="register" href="/register">ユーザ登録</a>
            </li>
            <li class="nav-item ml-2">
                <a class="nav-link text-white" href="/login">ログイン</a>
            </li>
        @endif
            
            
        </ul>
    </div>
</nav>


