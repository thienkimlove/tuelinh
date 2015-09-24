@extends('frontend')
@section('content')
    <section data-position="true" class="box-news" id="box-news">
        <div class="fix">
            <div class="layout">
                <div class="layout-left">
                    <article class="detail" id="data-detail">
                        <h1 class="title">{{$post->title}}</h1>
                        <div class="data">
                            {!! $post->content !!}
                        </div>

                        <div class="box-tags">
                            <span>Chủ đề</span>
                            @foreach ($post->tags as $tag)
                            <a href="{{url('tag', $tag->slug)}}" title="{{$tag->title}}">{{$tag->title}}</a>
                            @endforeach
                        </div><!--//box-tags-->

                        @if (!empty($banner))
                            <div class="box-adv-center">
                                <div class="data">
                                    <div class="item full">
                                        <p>{!! $banner !!}</p>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        @endif

                        <div class="social-follow">
                            <div class="fb-share-button" data-href="https://www.facebook.com/tuelinh.vn" data-layout="button_count"></div>
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
                            <div class="fb-comments" data-href="{{\Illuminate\Support\Facades\Request::url()}}" data-width="500" data-numposts="5"></div>
                        </div>
                    </article>
                </div>
               @include('frontend.right-tue-linh')
            </div>
        </div>
        @include('frontend.foot-slide')
    </section><!--//box-solution-->
@endsection
