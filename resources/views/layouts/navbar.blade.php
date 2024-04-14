
<!-- Header -->
<header class="header" id="header">

    <nav class="navbar container">
        <a href="./index.html">
            <h2 class="logo">HappyCoding</h2>
        </a>

        <div class="menu" id="menu">
            <ul class="list">
                <li class="list-item">
                    <a href="/" class="list-link current">Home</a>
                </li>
                <li class="list-item">
                    <a href="#" class="list-link">Categories</a>
                </li>
                <li class="list-item">
                    <a href="#" class="list-link">WHOAMI?</a>
                </li>

                @if (Auth::check())
                <li class="list-item screen-lg-hidden">
                    <a href="{{ route('login') }}" class="list-link">Sign in</a>
                </li>
                <li class="list-item screen-lg-hidden">
                    <a href="{{ route('register') }}" class="list-link">Sign up</a>
                </li>
                @else
                    <a href="/posts/create" class="list-link"><i class="ri-file-add-line"></i></a>

                <li class="list-item screen-lg-hidden">
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <a
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        this.closest('form').submit();"
                        >Log out</a>
                    </form>
                </li>

                @endif
            </ul>
        </div>

        <div class="list list-right">
            <button class="btn place-items-center" id="theme-toggle-btn">
                <i class="ri-sun-line sun-icon"></i>
                <i class="ri-moon-line moon-icon"></i>
            </button>

            <button class="btn place-items-center" id="search-icon">
                <i class="ri-search-line"></i>
            </button>

            <button class="btn place-items-center screen-lg-hidden menu-toggle-icon" id="menu-toggle-icon">
                <i class="ri-menu-3-line open-menu-icon"></i>
                <i class="ri-close-line close-menu-icon"></i>
            </button>
            @if (Auth::check())
                <button class="btn place-items-center menu-toggle-icon" id="menu-toggle-icon">
                <a href="{{ route('posts.create') }}" class="list-link"><i class="ri-file-add-line"></i></a>
                </button>
                <form method="POST" action="{{route('logout')}}">
                @csrf
                <a
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                this.closest('form').submit();"
                >Log out</a>
            </form>
            @else
            <a href="{{ route('login') }}" class="list-link screen-sm-hidden">Sign in</a>
                <a href="{{ route('register') }}" class="btn sign-up-btn fancy-border screen-sm-hidden">
                    <span>Sign up</span>
                </a>

            @endif


        </div>
    </nav>
</header>

<!-- Search -->
<div class="search-form-container container" id="search-form-container">

    <div class="form-container-inner">

        <form action="" class="form">
            <input class="form-input" type="text" placeholder="What are you looking for?">
            <button class="btn form-btn" type="submit">
                <i class="ri-search-line"></i>
            </button>
        </form>
        <span class="form-note">Or press ESC to close.</span>

    </div>

    <button class="btn form-close-btn place-items-center" id="form-close-btn">
        <i class="ri-close-line"></i>
    </button>

</div>
