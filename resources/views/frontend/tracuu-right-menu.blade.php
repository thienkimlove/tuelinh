<div class="layout-right">
    <div class="box-searchs">
        <div class="head">
            Tìm kiếm nhanh
        </div>
        <div class="search-q">
            <form action="">
                <input type="text" placeholder="Nội dung tìm kiếm">
                <a href="" class="btn-search">Tìm kiếm</a>
            </form>
        </div>
    </div>
    <div class="boxNotify">
        <div class="head">
            {{$category->title}}
        </div>
        <div class="content" id="scrollNotify">
            <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
            <div class="viewport">
                <div class="overview">
                    <div class="group">
                        <ul class="list-news">
                            @foreach ($list as $post)
                            <li><a href="{{url(str_slug($post->title.' '.$post->id))}}">{{$post->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--//boxNotify-->

    @include('frontend.right-noi-bat')

    @include('frontend.right-lien-quan')

    <div class="box-utility">
        <div class="list-utility">
            <a href=""><img src="{{url('images/bg/bg_u1.png')}}" alt="B1"></a>
            <a href=""><img src="{{url('images/bg/bg_u2.png')}}" alt="B1"></a>
            <a href=""><img src="{{url('images/bg/bg_u3.png')}}" alt="B1"></a>
        </div>
    </div>
    <div class="box-form-email">
        <div class="head">
            Đăng ký nhận tin
        </div>
        <div class="item">
            <form action="">
                <p>
                    Bạn là người luôn quan tâm đến thông tin y tế sức khỏe? Hãy đăng ký Email để được nhận tin từ Tuệ Linh mỗi ngày
                </p>
                <input type="text" placeholder="Email của bạn">
                <a href="" class="more">Gửi</a>
            </form>
        </div>
    </div>
    <div class="box-videos">
        <div class="head">
            Video
        </div>
        <div class="item">
            <div class="videoBoxIn">
                <div class="videoBoxInObject">
                    <iframe width="280" height="315" src="https://www.youtube.com/embed/gvCaHL0V-6A" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="box-social">
        <div class="head">
            Social
        </div>
        <div class="item">
            <img src="{{url('images/example/social.jpg')}}" alt="Social" width="300" height="274">
        </div>
    </div>
</div>