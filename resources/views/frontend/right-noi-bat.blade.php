<div class="box-hot">
    <div class="head">
        Tin tức nổi bật
    </div>
    <div class="item">
        <ul class="list-news">
            @foreach ($highlightPosts as $post)
                <li><a href="{{url(str_slug($post->title.' '.$post->id))}}">{{str_limit($post->title, env('TITLE_TRIM'))}}</a></li>
            @endforeach
        </ul>
    </div>
</div>