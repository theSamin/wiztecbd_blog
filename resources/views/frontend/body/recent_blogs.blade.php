<div class="widget">
    <h4 class="widget-title">Recent Blog</h4>
    <ul class="rc__post">

        @foreach ($blogs as $blog)
            <li class="rc__post__item">
                <div class="rc__post__thumb">
                    <a href="{{ route('blog.details', $blog->id) }}"><img src="{{ asset($blog->blog_image) }} "
                            alt=""></a>
                </div>
                <div class="rc__post__content">
                    <h5 class="title">{{ $blog->blog_title }}
                    </h5>
                    <span class="post-date"><i class="fal fa-calendar-alt"></i>
                        {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }} </span>
                </div>
            </li>
        @endforeach

    </ul>
</div>
