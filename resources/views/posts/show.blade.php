<x-guest-layout>
    <section class="blog-post section-header-offset">
        <div class="blog-post-container container">
            <div class="blog-post-data">
                <h3 class="title blog-post-title">{{ str_replace('-', ' ',$post->title) }}

                @can ('update', $post)
                    <span>Hi! i can edit</span>
                @endcan</h3>
                <div class="article-data">
                    <span>{{ date('F j, Y',strtotime($post->created_at)) }}</span>
                    <span class="article-data-spacer"></span>
                    <span>{{ $post->minutes }}</span>
                </div>
                <img src="{{ $post->image }}" alt="{{ $post->title }}">
            </div>

            <div class="container">
                <p>
                    {{ $post->body }}
                </p>
                {{-- <div class="author d-grid">
                    <div class="author-image-box">
                        <img src="./assets/images/author.jpg" alt="" class="article-image">
                    </div>
                    <div class="author-about">
                        <h3 class="author-name">John Doe</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque quis repellat rerum, possimus cumque dolor repellendus eligendi atque explicabo exercitationem id.</p> --}}
                        {{-- <ul class="list social-media">
                            <li class="list-item">
                                <a href="#" class="list-link"><i class="ri-instagram-line"></i></a>
                            </li>
                            <li class="list-item">
                                <a href="#" class="list-link"><i class="ri-facebook-circle-line"></i></a>
                            </li>
                            <li class="list-item">
                                <a href="#" class="list-link"><i class="ri-twitter-line"></i></a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer section">
        <div class="footer-container container d-grid">

            <div class="company-data">
                <a href="./index.html">
                    <h2 class="logo">NewsFlash</h2>
                </a>
                <p class="company-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, iure. Harum, animi dolores, nam, ad magni expedita.</p>
                <ul class="list social-media">
                    <li class="list-item">
                        <a href="#" class="list-link"><i class="ri-instagram-line"></i></a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link"><i class="ri-facebook-circle-line"></i></a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link"><i class="ri-twitter-line"></i></a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link"><i class="ri-pinterest-line"></i></a>
                    </li>
                </ul>
                <span class="copyright-notice">&copy;2021 NewsFlash. All rights reserved.</span>
            </div>

            <div>
                <h6 class="title footer-title">Categories</h6>
                <ul class="footer-list list">
                    <li class="list-item">
                        <a href="#" class="list-link">Travel</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Food</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Technology</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Health</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Nature</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Fitness</a>
                    </li>
                </ul>
            </div>

            <div>
                <h6 class="title footer-title">Useful links</h6>
                <ul class="footer-list list">
                    <li class="list-item">
                        <a href="#" class="list-link">Home</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Elements</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Tags</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Authors</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Membership</a>
                    </li>
                </ul>
            </div>

            <div>
                <h6 class="title footer-title">Company</h6>
                <ul class="footer-list list">
                    <li class="list-item">
                        <a href="#" class="list-link">Contact us</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">F.A.Q</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Careers</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Authors</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Memberships</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>



</x-guest-layout>
