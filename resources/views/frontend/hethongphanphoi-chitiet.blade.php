@extends('frontend')
@section('content')
    <section data-position="true" class="box-news" id="box-news">
        <div class="fix">
            <div class="layout">
                <div class="box-distribution">
                    <h1 class="title">Hệ thống phân phối tại {{$deliveries->first()->city}}</h1>
                    <div class="table table01">
                        <div class="row row01">
                            <div class="cel bg01">Số thứ tự</div>
                            <div class="cel bg02 taC">Nhà thuốc</div>
                            <div class="cel bg02 taC">Địa chỉ</div>
                            <div class="cel bg02 taC">Số điện thoại</div>
                            <div class="cel bg02 taC">Sản phẩm</div>
                        </div>
                       @foreach ($deliveries as $k => $delivery)
                       <div class="row{{($k % 2 == 0)? ' bg' : ''}}">
                            <div class="cel bg03">{{$k+1}}</div>
                              <div class="cel taC">{{$delivery->title}}</div>
                              <div class="cel taC">{{$delivery->address}}</div>
                              <div class="cel taC">{{$delivery->phone}}</div>
                              <div class="cel taC">{{$delivery->product}}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection