<section class="box-slide-foot">
    <div class="fix">
        <h2 class="title wow bounce-in-left" data-wow-duration="1s">Sản phẩm Tuệ Linh</h2>
        <div class="box-slide-products">
            <div class="owl-carousel" id="box-slide-foot">
                @foreach ($slidePosts as $slidePost)
                    <div class="item">
                        <a href="" title="">
                            <img src="{{url('cache/small', $slidePost->image)}}" width="140" height="167" alt=""/>
                        </a>
                        <div class="info-foot">
                            <h3>{{$slidePost->title}}</h3>
                            <p class="des">{{$slidePost->desc}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>