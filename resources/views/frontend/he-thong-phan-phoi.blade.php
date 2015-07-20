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
                                <select class="select" title="Chọn tỉnh thành">
                                    @foreach ($cities as $city)
                                    <option value="">{{$city}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="order">
                                <div class="option">
                                    <input type="button" value="Tìm kiếm" class="btn-search">
                                </div>
                            </div>
                        </div>
                    </div><!--//filter-->

                    @foreach ($area as $a)
                    <div class="col01">
                        <h3>{{$a['name']}}</h3>
                        <div class="area">
                            @foreach ($collection1 = array_slice($a['elements'], 0, intval(count($a['elements']) / 2), true) as $collection)
                            <a href="{{url('he-thong-phan-phoi', str_slug($collection))}}">{{$collection}}</a>
                            @endforeach

                        </div>
                        <div class="area">
                            @foreach ($collection2 = array_diff_key($a['elements'], $collection1) as $collection)
                                <a href="{{url('he-thong-phan-phoi', str_slug($collection))}}">{{$collection}}</a>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    <div class="col01">
                        <img src="{{url('images/example/map.png')}}" alt="map">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection