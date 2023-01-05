<div class="widget">
    <h4 class="widget-title">Categories</h4>
    <ul class="sidebar__cat">
        @foreach ($categories as $cat)
            <li class="sidebar__cat__item"> {{ $cat->blog_category }}
            </li>
        @endforeach
    </ul>
</div>
