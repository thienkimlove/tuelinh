@extends('frontend')
@section('content')

    <section data-position="true" class="box-news" id="box-news">
        <div class="fix">
            <div class="layout">
                <div class="layout-left">
                    <div class="box-list-news">
                        <h1 class="title">Thuốc chữa bệnh</h1>
                        @foreach ($posts as $k => $post)
                        <article class="item{{($k==$post->count()) ? 'last' : ''}}">
                            <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">
                                <img src="{{url('cache/small',  \App\ImageReverse::img($post->image))}}" width="220" height="130" alt="{{$post->title}}"/>
                            </a>
                            <time class="time" datetime="{{$post->created_at->format('D/m/y')}}">{{$post->created_at->format('D/m/y')}}</time>
                            <h3>
                                <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">{{str_limit($post->title, 40)}}</a>
                            </h3>
                            <p>{{str_limit($post->desc, 70)}}</p>
                        </article>
                        <div class="clear"></div>
                    </div><!--//box-article-->
                    <div class="box-paging">
                        {!! with(new \App\Pagination\AcmesPresenter($posts))->render() !!}
                        <div class="clear"></div>
                    </div><!--//box-paging-->
                </div>
                @include('frontend.tracuu-right-menu', ['news' => $news, 'list' => $list])
            </div>
        </div>
        @include('frontend.foot-slide')
    </section><!--//box-solution-->
@endsection