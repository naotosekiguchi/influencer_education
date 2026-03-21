<nav class="user-header">
    <div class="header-inner">
        <div class="header-left">
            <a href="{{ url('/timetable') }}" class="nav-btn btn-teal">
                時間割
            </a>

            <a href="{{ url('/progress') }}" class="nav-btn btn-teal">
                授業進捗
            </a>

            <a href="{{ route('profile.edit') }}" class="nav-btn btn-teal-small">
                プロフィール設定
            </a>
        </div>

        <div class="header-right">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="auth-link">
                        ログアウト
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="auth-link">
                    ログイン
                </a>
            @endauth
        </div>
    </div>
</nav>