@extends('frontend')
@section('content')
    <section data-position="true" class="box-news" id="box-news">
        <div class="fix">
            <div class="layout">
                <div class="layout-left">
                    <div class="box-news">
                        <div class="head">
                            <h1 class="title wow fade-in-left">Tuệ linh - tự hào trí tuệ việt</h1>
                            <p class="des wow fade-in-right">
                                Với tâm niệm tạo ra giá trị phục vụ người Việt dựa trên nền dược liệu truyền thống, Tuệ Linh không ngừng nghiên cứu phát triển các sản phẩm mới mang thương hiệu trí tuệ Việt
                            </p>
                        </div>
                        @foreach ($posts->chunk(3) as $k => $groupPost)
                            <div class="data wow bounce-in-{{($k % 2 == 0)? 'right' : 'left'}}">
                                @foreach ($groupPost as $post)
                                    <div class="item wow animated" data-wow-delay="0.6s" data-wow-duration="1s">
                                        <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">
                                            <img src="{{url('cache/256x256',  \App\ImageReverse::img($post->image))}}"  alt=""/>
                                        </a>
                                        <h3>
                                            <a href="{{url(str_slug($post->title.' '.$post->id))}}">{{str_limit($post->title, env('TITLE_TRIM'))}}</a>
                                        </h3>
                                        <p>
                                            <a href="{{url(str_slug($post->title.' '.$post->id))}}">{{str_limit($post->desc, env('DESC_TRIM'))}}</a>
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <div class="box-paging">
                            {!! with(new \App\Pagination\AcmesPresenter($posts))->render() !!}
                        </div>
                    </div>
                </div>
                <div class="layout-right">
                    <div class="item">
                        <ul class="list-menu">
                            <li><a href="">Danh mục sản phẩm</a></li>
                            @foreach ($tags as $tag)
                                <li><a href="{{url('tag', $tag->slug)}}">{{$tag->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!--//box-solution-->
@endsection