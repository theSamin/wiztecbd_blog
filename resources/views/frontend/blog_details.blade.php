@extends('frontend.main_master')
@section('main')
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">{{ $item->blog_title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->


        <!-- blog-details-area -->
        <section class="standard__blog blog__details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="standard__blog__post">
                            <div class="standard__blog__thumb">
                                <img src="{{ asset($item->blog_image) }}" alt="">
                            </div>
                            <div class="blog__details__content services__details__content">
                                <ul class="blog__post__meta">
                                    <li><i class="fal fa-calendar-alt"></i>
                                        {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</li>

                                </ul>
                                <h2 class="title">{{ $item->blog_title }}</h2>
                                <p> {!! $item->blog_description !!} </p>
                            </div>
                            <div class="blog__details__bottom">
                                <ul class="blog__details__tag">
                                    <li class="tags-list">Tag: {{ $item->blog_tags }}</li>
                                </ul>
                                <ul class="blog__details__social">
                                    <li class="title">Share :</li>
                                    <li class="social-icons">
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-twitter-square"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                        <a href="#"><i class="fab fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="comment comment__wrap">
                                <div class="comment__title">
                                    <h4 class="title">Comment</h4>
                                </div>
                                <ul class="comment__list">
                                    @foreach ($comments as $comment)
                                        <li class="comment__item">
                                            <div class="comment__content">
                                                <div class="comment__avatar__info">
                                                </div>
                                                <p>{{ $comment->message }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="comment__form">
                                <div class="comment__title">
                                    <h4 class="title">Write your comment</h4>
                                </div>
                                <form method="post" action="{{ route('store.comment') }}">
                                    @csrf

                                    <div class="row">
                                        {{-- <div class="col-md-6">
                                            <input type="text" placeholder="Enter your name">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" placeholder="Enter your mail">
                                        </div> --}}
                                        <input type="hidden" id="blogId" name="blogId" value="{{ $item->id }}">
                                    </div>
                                    <textarea name="message" id="message" placeholder="Enter your Massage"></textarea>
                                    <button type="submit" class="btn">post a comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="blog__sidebar">
                            <div class="widget">
                                <form method="post" action="{{ route('blog.search') }}" class="search-form">
                                    @csrf

                                    <input name="search" type="text" placeholder="Search">
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
        <!-- blog-details-area-end -->


    </main>
@endsection
