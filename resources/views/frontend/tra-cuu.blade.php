@extends('frontend')
@section('content')
    <section data-position="true" class="box-news" id="box-news">
        <div class="fix">
            <div class="layout">
                <div class="layout-left">
                    <article class="detail" id="data-detail">
                        <h1 class="title">{{$category->title}}</h1>
                        <div class="data">
                            <div class="col-left">
                                <ul class="list">
                                    @foreach ($postSlice = $posts->splice(floor($posts->count()/2)) as $post)
                                        <li><a href="{{url(str_slug($post->title.' '.$post->id))}}">{{str_limit($post->title, env('TITLE_TRIM'))}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-right">
                                <ul class="list">
                                    @foreach ($posts as $post)
                                        <li><a href="{{url(str_slug($post->title.' '.$post->id))}}">{{str_limit($post->title, env('TITLE_TRIM'))}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
                @include('frontend.tracuu-right-menu', ['list' => $list])
            </div>
        </div>
        @include('frontend.foot-slide')
    </section>
@endsection
