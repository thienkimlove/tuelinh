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
                        @foreach ($posts->chunk(3) as $groupPost)
                            <div class="data wow bounce-in-right">
                                @foreach ($groupPost as $post)
                                    <div class="item wow animated" data-wow-delay="0.6s" data-wow-duration="1s">
                                        <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">
                                            <img src="{{url('cache/medium',  \App\ImageReverse::img($post->image))}}" width="256" height="256" alt=""/>
                                        </a>
                                        <h3>
                                            <a href="{{url(str_slug($post->title.' '.$post->id))}}">{{$post->title}}</a>
                                        </h3>
                                        <p>
                                            <a href="{{url(str_slug($post->title.' '.$post->id))}}">{{$post->desc}}</a>
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!--//box-solution-->
@endsection