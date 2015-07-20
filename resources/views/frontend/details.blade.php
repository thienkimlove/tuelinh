@extends('frontend')
@section('content')
    <section data-position="true" class="box-news" id="box-news">
        <div class="fix">
            <div class="layout">
                <div class="layout-left">
                    <article class="detail" id="data-detail">
                        <h1 class="title">{{$post->title}}</h1>
                        <div class="data">
                            <p style="text-align: center">
                                <img src="{{url('cache/large',  \App\ImageReverse::img($post->image))}}" width="835" height="424" alt=""/>
                            </p>
                            {!! $post->content !!}
                        </div>
                        <div class="box-tags">
                            <span>Chủ đề</span>
                            @foreach ($post->tags as $tag)
                            <a href="{{url('tag', $tag->slug)}}" title="{{$tag->title}}">{{$tag->title}}</a>
                            @endforeach
                        </div><!--//box-tags-->
                        <div class="social-follow">
                            <img src="{{url('images/example/social01.jpg')}}" alt="">
                        </div>
                        <div class="released-post">
                            <h3>Tin liên quan</h3>
                            <ul class="list-released">
                                @foreach ($relatePosts as $relatedPost)
                                    <li><a href="{{url(str_slug($relatedPost->title.' '.$relatedPost->id))}}">{{$relatedPost->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="comment-post">
                            <img src="{{url('images/example/social01.jpg')}}" alt="">
                        </div>
                    </article>
                </div>
               @include('frontend.right-tue-linh')
            </div>
        </div>
        @include('frontend.foot-slide')
    </section><!--//box-solution-->
@endsection
