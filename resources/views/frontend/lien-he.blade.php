@extends('frontend')

@section('content')
    <section data-position="true" class="box-news" id="box-news">
        <div class="fix">
            <div class="layout">
                <div class="box-contact">
                    <h1 class="title">Liên hệ</h1>
                    <div class="col-left">
                        <h3 class="head">Địa chỉ liên hệ</h3>
                        <ul>
                            <li><strong>Tại Hà Nội</strong></li>
                            <li>Địa chỉ : Tầng 5 tòa nhà 29T1, phố Hoàng Đạo Thúy, Trung Hòa, Cầu Giấy, Hà Nội</li>
                            <li>ĐT: 04.62824344</li>
                            <li>Fax: 04.62824263</li>
                            <li><strong>Chi nhánh TP. HCM</strong></li>
                            <li>Địa chỉ  : 156/17  Tô Hiến Thành – P15 – Q10 – TP.HCM.</li>
                            <li>ĐT : 083.9797779</li>
                            <li>Fax: 086.2646832.</li>
                            <li>Đường dây nóng: 0912571190.</li>
                        </ul>
                        <div class="map-tuelinh">
                            <img src="{{url('images/example/maptuelinh.jpg')}}" alt="map">
                        </div>
                    </div>
                    <div class="col-right">
                        <h3 class="head">Gửi thư liên hệ</h3>
                        <form action="" method="post">
                            <input type="text" name="name" class="txt txt-name" placeholder="Họ và tên"/>
                            <input type="email" name="email" class="txt txt-email" placeholder="Email"/>
                            <input type="number" name="phone" class="txt txt-phone" placeholder="Số điện thoại"/>
                            <textarea name="content" class="txt txt-content" placeholder="Nội dung"></textarea>
                            <input type="submit" value="gửi đi" class="btn btn-submit"/>
                            <input type="reset" value="Làm lại" class="btn btn-submit"/>
                        </form>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        @include('frontend.foot-slide')
    </section><!--//box-solution-->
@endsection