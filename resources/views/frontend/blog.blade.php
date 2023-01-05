@extends('frontend.main_master')
@section('main')
@section('title')
    Blog | Wiztecbd
@endsection

<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title"> Our Blog </h2>
                        <span>News from WiztecBD and Around The World of Digital
                            Services Agency</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->


    <!-- blog-area -->
    <section class="standard__blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if (count($blogs) == 0)
                        <h2>No blogs found</h2>
                    @else
                        @foreach ($blogs as $blog)
                            <div class="standard__blog__post">
                                <div class="standard__blog__thumb">
                                    <img src="{{ asset($blog->blog_image) }}" alt="">
                                    <a href="{{ route('blog.details', $blog->id) }}" class="blog__link"><i
                                            class="far fa-long-arrow-right"></i></a>
                                </div>
                                <div class="standard__blog__content">
                                    <div class="blog__post__avatar">
                                        <div class="thumb"><img src="{{ asset($blog->blog_image) }}" alt="">
                                        </div>
                                        <span class="post__by">By Dalky</span>
                                    </div>
                                    <h2 class="title">{{ $blog->blog_title }}</h2>
                                    <p>{{ Str::limit($blog->blog_description, 150) }} </p>
                                    <ul class="blog__post__meta">
                                        <li><i class="fal fa-calendar-alt"></i>
                                            {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</li>


                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @endif


                    <div class="pagination-wrap">
                        {{ $blogs->links('vendor\pagination\rasalina-ui') }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="blog__sidebar">
                        <div class="widget">
                            <form method="post" action="{{ route('blog.search') }}" class="search-form">
                                @csrf

                                <input name="search" type="text" placeholder="Search"
                                    value="{{ $search_key ? $search_key : '' }}">
                                <button type="submit"><i class="fal fa-search"></i></button>
                            </form>
                        </div>

                        @include('frontend.body.recent_blogs')

                        @include('frontend.body.categories')

                        <div class="widget">
                            <h4 class="widget-title">Popular Tags</h4>
                            <ul class="sidebar__tags">
                                <li>Agency</li>
                                <li>Business</li>
                                <li>Digital</li>
                                <li>Engagement</li>
                                <li>Marketing</li>
                                <li>Design</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->

</main>
@endsection
