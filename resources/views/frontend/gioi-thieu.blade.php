@extends('frontend')

@section('content')
    <section data-position="true" class="box-news" id="box-news">
        <div class="fix">
            <div class="layout">
                <div class="layout-left">
                    <article class="detail" id="data-detail">
                        <h1 class="title">Dầu gấc tuệ linh</h1>
                        <div class="data">
                        </div>
                        <div class="box-tags">
                            <span>Chủ đề</span>
                            <a href="" title="">Gẻ</a>
                            <a href="" title="">Bệnh trỹ</a>
                            <a href="" title="">Tiểu đường</a>
                            <a href="" title="">Viêm gan</a>
                            <a href="" title="">Sốt phát ban</a>
                        </div><!--//box-tags-->
                        <div class="social-follow">
                            <img src="images/example/social01.jpg" alt="">
                        </div>
                        <div class="released-post">
                            <h3>Tin liên quan</h3>
                            <ul class="list-released">
                                <li><a href="">Bệnh lởm mồm long móng</a></li>
                                <li><a href="">HIV căn bệnh vãi bệnh</a></li>
                                <li><a href="">Bệnh ghẻ ở thanh niên chưa vợ</a></li>
                                <li><a href="">CLJT mà bẩn</a></li>
                                <li><a href="">Tại sao lại bị thế</a></li>
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