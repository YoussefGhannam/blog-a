
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
                <div class="dropdown">
                <button class="btn dropdown-toggle" id="account-dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-user-line"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="account-dropdown-toggle">
                    <a class="dropdown-item" href="{{ route('posts.index') }}">My Articles</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item" type="submit">Logout</button>
                    </form>
                </div>
            </div>
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
        <input class="form-input" type="text" placeholder="What are you looking for?" id="search-input">
        <button class="btn form-btn" type="submit">
            <i class="ri-search-line"></i>
        </button>
        <div id="search-results" style="width: 400px; display: none;grid-template-columns: repeat(4, 1fr);
    gap: 10px;justify-content: center;
    align-items: center;"></div>
    </div>
    <span class="form-note">Or press ESC to close.</span>
    <button class="btn form-close-btn place-items-center" id="form-close-btn">
        <i class="ri-close-line"></i>
    </button>
</div>
<style>

    .dropdown-menu {
    min-width: 150px;
    padding: 10px;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.dropdown-item {
    padding: 8px 12px;
    font-size: 13px;
    font-weight: 500;
    transition: 0.05s;
}

.dropdown-item:hover {
    font-weight: 800;
}
.search-result {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 5px;
    width: 350px;
    height: 100px;
    transition: all 0.3s ease;
    border-radius: 10px;
}

.search-result:hover {
    background-color: #f0f0f0; /* Change background color on hover */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add box shadow on hover for depth */
}
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the dropdown toggle button
        var dropdownToggle = document.getElementById('account-dropdown-toggle');

        // Get the dropdown menu
        var dropdownMenu = document.querySelector('.dropdown-menu');

        // Toggle the dropdown menu visibility when the dropdown toggle button is clicked
        dropdownToggle.addEventListener('click', function () {
            dropdownMenu.classList.toggle('show');
        });

        // Close the dropdown menu when clicking outside of it
        window.addEventListener('click', function (event) {
            if (!event.target.matches('.dropdown-toggle')) {
                var dropdowns = document.getElementsByClassName('dropdown-menu');
                for (var i = 0; i < dropdowns.length; i++) {
                    var dropdown = dropdowns[i];
                    if (dropdown.classList.contains('show')) {
                        dropdown.classList.remove('show');
                    }
                }
            }
        });
    });
</script>
<script>
    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');

    searchInput.addEventListener('input', function () {
        const query = this.value.trim();
        if (query.length === 0) {
            searchResults.style.display = 'none';
            return;
        }
        fetch(`/search?query=${query}`)
            .then(response => response.json())
            .then(data => {
                console.log('Search results:', data);
                const resultsHtml = data.map(post => {
                    return `<div class="search-result">
                                <a href="/posts/${encodeURIComponent(post.title)}">${post.title}</a>
                            </div>`;
                }).join('');
                searchResults.innerHTML = resultsHtml;
                searchResults.style.display = 'grid';

            });
    });
</script>
