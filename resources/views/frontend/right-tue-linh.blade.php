<div class="layout-right">
    <div class="item">
        <ul class="list-menu">
            @foreach ($tuelinh as $post)
            <li><a href="{{url(str_slug($post->title))}}" class="{{ (!empty($currentTuelinh) && $currentTuelinh == str_slug($post->title))? 'active' : '' }}">{{$post->title}}</a></li>
            @endforeach
        </ul>
    </div>
</div>