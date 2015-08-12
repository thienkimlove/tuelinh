@extends('frontend')

@section('content')
<section class="box-slide" id="box-slide" data-set="space-slider" data-fix="header">
    <div class="owl-carousel" id="slide-home">
        <div class="item">
            <img src="{{url('images/example/banner-1356x658-1.jpg')}}" width="1356" height="658" alt=""/>
            <a class="over" href="" title=""></a>
        </div>
        <div class="item">
            <img src="{{url('images/example/banner-1356x658-2.jpg')}}" width="1356" height="658" alt=""/>
            <a class="over" href="" title=""></a>
        </div>
        <div class="item">
            <img src="{{url('images/example/banner-1356x658-3.jpg')}}" width="1356" height="658" alt=""/>
            <a class="over" href="" title=""></a>
        </div>
    </div>
</section><!--//box-slide-->
<section data-position="true" class="box-news" id="box-news">
    <div class="fix">
        <div class="head">
            <h2 class="title wow bounce-in-left" data-wow-duration="1s">Tin tức Tuệ Linh</h2>
        </div>
        <div class="data wow bounce-in-right" data-wow-duration="1s">
            <div class="owl-carousel" id="slide-news">
                @foreach ($news as $post)
                <div class="item wow animated" data-wow-delay="0.6s" data-wow-duration="1s">
                    <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">
                        <img src="{{url('cache/256x256',  $post->image)}}"  alt=""/>
                    </a>
                    <p class="soft-news">{{$post->category->title}}</p>
                    <h3>
                        <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="">{{$post->title}}</a>
                    </h3>
                    <h4>
                        <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">Chi tiết</a>
                    </h4>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section><!--//box-banner-->
<section class="box-video" id="box-video">
    <div class="fix">
        <div class="inner">
            <div class="item">
                <div class="left-img wow zoom-in">
                    <img src="{{url('images/example/left_img.png')}}" alt="" width="393" height="298">
                </div>
                <div class="bottom-img wow zoom-in">
                    <img src="{{url('images/example/bottom_img.png')}}" alt="">
                </div>
                <div class="text">
                    <h2 class="title">Tiếp bước con đường của đại Danh y Tuệ Tĩnh </h2>
                    <p class="data">
                        Tiếp bước con đường của đại Danh y Tuệ Tĩnh với phương châm “Nam dược trị Nam nhân”
                        Công ty TUỆ LINH lấy trí TUỆ làm nền tảng, làm động lực phát triển để sản xuất ra các sản phẩm LINH nghiệm.
                    </p>
                    <div class="process wow bounce-in animated">
                        <a class='youtube' href="http://www.youtube.com/embed/KZDOmzD7K2c?rel=0&amp;wmode=transparent"><img src="{{url('images/example/i_video.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="gallery">
                    <img src="{{url('images/example/avatar.png')}}" alt="" width="300" height="550">
                </div>
            </div>
        </div>
    </div>
</section><!--//box-video-->
<section class="box-resources" id="box-resources">
    <div class="fix">
        <div class="head">
            <h3 class="title wow fade-in-left" data-wow-delay="1s" data-wow-duration="1s">CHUẨN HÓA NGUỒN NGUYÊN LIỆU, QUY TRÌNH SẢN XUẤT </h3>
            <p class="des wow fade-in-right">Cho ra đời những sản phẩm chất lượng phục vụ công tác chăm sóc sức khỏe cộng đồng </p>
        </div>
        @foreach ($forms->chunk(2) as $gPost)
        <div class="data">
            @foreach ($gPost as $post)
            <div class="item">
                <a href="{{url(str_slug($post->title.' '.$post->id))}}" class="thumb">
                    <img src="{{url('cache/500x350', $post->image)}}" alt="" ></a>
                <h3><a href="{{url(str_slug($post->title.' '.$post->id))}}">{{$post->title}}</a></h3>
                <p>{{$post->desc}}</p>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section><!--//box-resources-->
<section class="box-product">
    <div class="left-img">
        <img src="{{url('images/example/left01.png')}}" alt="">
    </div>
    <div class="fix">
        <div class="head">
            <h3 class="title wow fade-in-left" data-wow-delay="1s" data-wow-duration="1s">Sản phẩm tuệ linh</h3>
            <p class="des wow fade-in-right">Cho ra đời những sản phẩm chất lượng phục vụ công tác chăm sóc sức khỏe cộng đồng </p>
        </div>
        @foreach ($products->chunk(4) as $gPost)
        <div class="data">
            @foreach ($gPost as $post)
            <div class="item wow rotate-left" data-wow-delay="0.6s" data-wow-duration="1s">
                <div class="item-bg">
                    <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">
                        <img src="{{url('cache/256x256',  $post->image)}}" alt=""/>
                    </a>
                </div>
                <div class="des">
                    <h3>
                        <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">{{$post->title}}</a>
                    </h3>
                    <h4>
                        <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">
                            {{$post->desc}}
                        </a>
                    </h4>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
        <div class="box-paging">
            {!! with(new \App\Pagination\AcmesPresenter($products))->render() !!}
        </div>
    </div>
</section><!--//box-product-->
<section data-position="true" class="box-activity">
    <div class="fix">
        <div class="head">
            <h3 class="title wow fade-in-left" data-wow-delay="1s" data-wow-duration="1s">Hoạt động từ thiện </h3>
            <p class="des wow fade-in-right">Cho ra đời những sản phẩm chất lượng phục vụ công tác chăm sóc sức khỏe cộng đồng </p>
        </div>
        <div class="data wow bounce-in-right" data-wow-duration="1s">
            <div class="owl-carousel" id="slide-activity">
                @foreach ($charities as $post)
                <div class="item wow animated" data-wow-delay="0.6s" data-wow-duration="1s">
                    <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">
                        <img src="{{url('cache/256x190', $post->image)}}"  alt=""/>
                    </a>
                    <p class="soft-news">Tin công ty</p>
                    <h3>
                        <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">{{$post->title}}</a>
                    </h3>
                    <h4>
                        <a href="{{url(str_slug($post->title.' '.$post->id))}}" title="{{$post->title}}">Chi tiết</a>
                    </h4>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section><!--//box-activity-->
<section class="box-group">
    <div class="fix">
        <div class="head">
            <h3 class="title wow bounce-in" data-wow-delay="1s" data-wow-duration="1s">Hội đồng chuyên môn</h3>
            <p class="des wow fade-in-right">Cho ra đời những sản phẩm chất lượng phục vụ công tác chăm sóc sức khỏe cộng đồng </p>
        </div>
        <div class="data">
            <div class="owl-carousel" id="slide-group">
                @foreach ($friends as $friend)
                <div class="item wow bounce-in" data-wow-delay="0.6s" data-wow-duration="1s">
                    <a href="#" title="">
                        <img src="{{url('cache/256x256',  $friend->image)}}"  alt=""/>
                    </a>
                    <h3>
                        <a href="#" title="">{{$friend->title}}</a>
                    </h3>
                    <h4>
                        <a href="#" title="">{{$friend->desc}}</a>
                    </h4>
                </div>
               @endforeach
            </div>
        </div>
    </div>
</section>
<section class="box-slideF">
    <div class="fix">
        <h3 class="title wow fade-in-left"><img src="{{url('images/example/header.png')}}" alt="Header" width="643" height="68"></h3>
        <div class="box-cup fade-in-right">
            <div class="owl-carousel" id="slide-cup">
                @foreach ($awards as $award)
                <div class="item">
                    <a href="javascript:void(0)" title="">
                        <img src="{{url('cache/140x167', $award->image)}}" />
                    </a>
                    <p class="year">{{$award->year}}</p>
                </div>
                @endforeach
            </div>
            <div class="mess">
                <p>
                    Chuẩn hóa vùng nguyên liệu tập trung có ý nghĩa sống còn với hầu hết các ngành sản xuất, đặc biệt là với ngành dược. Thế nhưng, dường như nhiề doanh nghiệp dược phẩm Việt Nam vẫn còn đang tìm lời giải cho bài toán này… Chuẩn hóa vùng nguyên liệu tập trung có ý nghĩa sống còn với hầu hết các ngành sản xuất, đặc biệt là với ngành dược. Thế nhưng, dường như nhiề doanh nghiệp dược phẩm Việt Nam vẫn còn đang tìm lời giải cho bài toán này…
                </p>
            </div>
        </div><!--//box-Cup-->
    </div>
</section>
@endsection
