@extends('frontend')
@section('content')

    <section data-position="true" class="box-news" id="box-news">
        <div class="fix">
            <div class="layout">
                <div class="layout-left">
                    <div class="box-news">
                        <div class="head">
                            <h1 class="title wow fade-in-left">{{$category->title}}</h1>
                        </div>
                        @foreach ($posts->chunk(3) as $k => $groupPost)
                        <div class="data wow bounce-in-{{($k % 2 == 0)? 'right' : 'left'}}">
                            @foreach ($groupPost as $post)
                            <div class="item wow animated" data-wow-delay="0.6s" data-wow-duration="1s">
                                <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">
                                    <img src="{{url('cache/medium',  \App\ImageReverse::img($post->image))}}" width="256" height="256" alt=""/>
                                </a>
                                <p class="soft-news">{{$post->category->title}}</p>
                                <h3>
                                    <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">{{$post->title}}</a>
                                </h3>
                                <h4>
                                    <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">Chi tiết</a>
                                </h4>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                        <div class="box-paging">
                            {!! with(new \App\Pagination\AcmesPresenter($posts))->render() !!}
                        </div>
                    </div>
                </div>
               @include('frontend.basic-layout-right')
            </div>
        </div>
        @include('frontend.foot-slide')
    </section><!--//box-News-->
@endsection