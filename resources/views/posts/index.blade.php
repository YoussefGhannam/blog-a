
<x-guest-layout>
    <!-- Featured articles -->
    <section class="featured-articles section section-header-offset">

        <div class="featured-articles-container container d-grid">

            <div class="featured-content d-grid">

                <div class="headline-banner">
                    <h3 class="headline fancy-border">
                        <span class="place-items-center">Breaking news</span>
                    </h3>
                    <span class="headline-description">Apple announces a new partnership...</span>
                </div>

                @foreach ($hero_posts as $hero_post)

                <a href="{{route('posts.show',$hero_post->title)}}" class="article featured-article featured-article-{{$loop->iteration}}">
                    <img src="{{$hero_post->image}}" alt="{{ str_replace('-',' ',$hero_post->title)}} )" class="article-image">
                    <span class="article-category">{{$hero_post->category->name}}</span>

                    <div class="article-data-container">

                        <div class="article-data">
                            <span>{{ date('F j, Y',strtotime($hero_post->created_at)) }}</span>
                            <span class="article-data-spacer"></span>
                            <span>{{ $hero_post->minutes }} min to read</span>
                        </div>

                        <h3 class="title article-title">{{ str_replace('-',' ',$hero_post->title)}} </h3>
                        @can ('update posts', $hero_post)
                            <span>Hi! i can edit</span>
                        @endcan

                    </div>
                </a>
                @endforeach
            </div>

            <div class="sidebar d-grid">

                <h3 class="title featured-content-title">Trending news</h3>

                @foreach ($trending_posts as $trending_post)
                <a href="{{route('posts.show',$trending_post->title)}}" class="trending-news-box">
                    <div class="trending-news-img-box">
                        <span class="trending-number place-items-center">0{{ $loop->iteration}}</span>
                        <img src="{{ $trending_post->image }}" alt=" {{ str_replace('-',' ',$trending_post->title)}}" class="article-image">
                    </div>

                    <div class="trending-news-data">

                        <div class="article-data">
                            <span>{{ date('F j, Y',strtotime($trending_post->created_at)) }}</span>
                            <span class="article-data-spacer"></span>
                            <span>{{ $trending_post->minutes }} min to read</span>
                        </div>

                        <h3 class="title article-title">{{ str_replace('-',' ',$trending_post->title)}}</h3>

                    </div>
                </a>
                @endforeach







            </div>

        </div>

    </section>

    <!-- Quick read -->
    <section class="quick-read section">

        <div class="container">

            <h2 class="title section-title" data-name="Quick read">Quick read</h2>
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    @foreach ($quick_posts as $quick_post)
                    <!-- Slides -->
                    <a href="{{route('posts.show',$quick_post->title)}}" class="article swiper-slide">
                        <img src="{{ $quick_post->image }}" alt=" {{ str_replace('-',' ',$quick_post->title)}} " class="article-image">

                        <div class="article-data-container">
                            <div class="article-data">
                                <span>{{ date('F j, Y',strtotime($quick_post->created_at)) }}</span>
                                <span class="article-data-spacer"></span>
                                <span>{{ $quick_post->minutes }} min to read</span>
                            </div>
                            <h3 class="title article-title">{{ str_replace('-',' ',$quick_post->title)}}</h3>
                        </div>
                    </a>
                    @endforeach

                </div>
                <!-- Navigation buttons -->
                <div class="swiper-button-prev swiper-controls"></div>
                <div class="swiper-button-next swiper-controls"></div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section>

    <!-- Older posts -->
    <section class="older-posts section">

        <div class="container">

            <h2 class="title section-title" data-name="Older posts">Older posts</h2>

            <div class="older-posts-grid-wrapper d-grid">



                @foreach ($older_posts as $older_post)
                <a href="{{route('posts.show',$older_post->title)}}" class="article d-grid">
                    <div class="older-posts-article-image-wrapper">
                        <img src="{{ $older_post->image }}" alt=" {{ $older_post->title }} " class="article-image">
                    </div>

                    <div class="article-data-container">

                        <div class="article-data">
                            <span>{{ date('F j ,Y',strtotime($older_post->created_at)) }}</span>
                            <span class="article-data-spacer"></span>
                            <span>{{ $older_post->minutes }} min to read</span>
                        </div>

                        <h3 class="title article-title">{{ $older_post->title }}</h3>
                        <p class="article-description">{{ substr($older_post->body,0,50) }}...</p>

                    </div>
                </a>
                @endforeach


            </div>

            <div class="see-more-container">
                <a href="#" class="btn see-more-btn place-items-center">See more <i class="ri-arrow-right-s-line"></i></a>
            </div>

        </div>

    </section>

    <!-- Popular tags -->
    <section class="popular-tags section">

        <div class="container">

            <h2 class="title section-title" data-name="Popular tags">Popular tags</h2>

            <div class="popular-tags-container d-grid">

                @foreach ($popular_categories as $popular_category)
                    <a href="#" class="article">
                        <span class="tag-name">{{ $popular_category->name }}</span>
                        <img src="{{ $popular_category->image }}"    alt="{{ $popular_category->name }}" class="article-image">
                    </a>
                @endforeach

            </div>

        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter section">

        <div class="container">

            <h2 class="title section-title" data-name="Newsletter">Newsletter</h2>

            <div class="form-container-inner">
                <h6 class="title newsletter-title">Subscribe to NewsFlash</h6>
                <p class="newsletter-description">Lorem ipsum dolor sit amet consectetur adipisicing quaerat dignissimos.</p>

                <form action="" class="form">
                    <input class="form-input" type="text" placeholder="Enter your email address">
                    <button class="btn form-btn" type="submit">
                        <i class="ri-mail-send-line"></i>
                    </button>
                </form>

            </div>

        </div>

    </section>
</x-guest-layout>
