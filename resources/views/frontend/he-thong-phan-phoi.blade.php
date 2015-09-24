@extends('frontend')
@section('content')
    <section data-position="true" class="box-news" id="box-news">
        <div class="fix">
            <div class="layout">
                <div class="box-distribution">
                    <h1 class="title">Hệ thống phân phối Tuệ Linh</h1>
                    <div class="filter">
                        <div class="group">
                            <div class="option">
                                <select id="select-product" class="select" title="Chọn Sản phẩm">
                                    <option selected="true">Chọn Sản phẩm</option>
                                    @foreach ($products as $id => $name)
                                        <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="option">
                                <select id="select-city" class="select" title="Chọn Thành Phố">
                                    <option selected="true">Chọn Thành Phố</option>
                                    @foreach ($cities as $id => $name)
                                        <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="order">
                                <div class="option">
                                    <input id="search-delivery" type="button" value="Tìm kiếm" class="btn-search">
                                </div>
                            </div>
                        </div>
                    </div><!--//filter-->

                    <div class="col01">
                        <img src="{{url('images/example/map.png')}}" alt="map">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <script>
        $( document ).ready(function(){
            $('#search-delivery').click(function(){
                var product_id = $('#select-product').val();
                var city_id = $('#select-city').val();
                window.location.href = window.base_url + '/he-thong-phan-phoi/' + product_id + '/' + city_id;
            })
        });
    </script>
@endsection

