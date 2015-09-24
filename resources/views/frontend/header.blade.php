<div class="space-header" id="space-header"></div>
<div class="space-breadcrumb" id="space-breadcrumb"></div>
<div class="space-slider" id="space-slider"></div>
<header class="header" id="header" data-set="space-header">
    <div class="fix">
        <nav>
            <ul class="nav-main">
                <li class="current-menu-item">
                    <a href="{{url('/')}}" title="">{{trans('common.home_cate')}}</a>
                </li>
                <li>
                    <a href="#" title="">Tuệ Linh</a>
                    <ul>
                        <li>
                            <a href="{{url('gioi-thieu')}}" title="">{{trans('common.recommend_cate')}}</a>
                        </li>
                        <li>
                            <a href="{{url('tin-tuc')}}" title="">{{$cates['tin-tuc']}}</a>
                        </li>
                        <li>
                            <a href="{{url('tin-tuc/hoat-dong-tu-thien')}}" title="">{{$cates['hoat-dong-tu-thien']}}</a>
                        </li>
                        <li>
                            <a href="{{url('tin-tuc/tin-tuyen-dung')}}" title="">{{$cates['tin-tuyen-dung']}}</a>
                        </li>
                        <li class="last">
                            <a href="{{url('tin-tuc/thu-vien')}}" title="">{{$cates['thu-vien']}}</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('san-pham')}}" title="">{{$cates['san-pham']}}</a>
                </li>
                <li>
                    <a href="#" title="">{{trans('common.yduoc_cate')}}</a>
                    <ul>
                        <li>
                            <a href="{{url('thong-tin-suc-khoe/me-va-be')}}" title="">{{$cates['me-va-be']}}</a>
                        </li>
                        <li>
                            <a href="{{url('thong-tin-suc-khoe/y-hoc-co-truyen')}}" title="">{{$cates['y-hoc-co-truyen']}}</a>
                        </li>
                        <li>
                            <a href="{{url('thong-tin-suc-khoe/khoe-va-dep')}}" title="">{{$cates['khoe-va-dep']}}</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="">{{trans('common.tracuu_cate')}}</a>
                    <ul>
                        <li>
                            <a href="{{url('dai-cuong-ve-benh')}}" title="">{{$cates['dai-cuong-ve-benh']}}</a>
                        </li>
                        <li>
                            <a href="{{url('tim-thuoc-theo-benh')}}" title="">{{$cates['tim-thuoc-theo-benh']}}</a>
                        </li>
                        <li>
                            <a href="{{url('thuoc-nam-tri-benh')}}" title="">{{$cates['thuoc-nam-tri-benh']}}</a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{url('he-thong-phan-phoi')}}" title="">{{trans('common.delivery_cate')}}</a></li>

                <li><a href="{{url('lien-he')}}" title="">{{trans('common.contact_cate')}}</a></li>
            </ul>
        </nav>
        <div class="search" id="search">
            <form>
                <input type="text" placeholder="{{trans('common.search_placeholder')}}" name="keyword" class="txt"/>
                <input type="submit" value="" name="submit" class="btn"/>
            </form>
        </div>

        <div class="language of-hide" id="language">
            <div class="selected {{$current}}" id="selected">{{$locales[$current]}}</div>
            <ul class="nav-language" id="nav-language">
                @foreach ($locales as $key => $local)
                  @if ($key !=  $current)
                    <li>
                        <a class="{{$key}}" key="{{$key}}" title="">{{$local}}</a>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>

        <nav>
            <ul class="nav-social">
                <li>
                    <a target="_blank" class="social-1" href="https://www.facebook.com/tuelinh.vn" title="">Facebook</a>
                </li>
                <li>
                    <a target="_blank" class="social-3" href="https://www.youtube.com/user/tuelinhgroup" title="">Social3</a>
                </li>
            </ul>
        </nav>
    </div>
</header>