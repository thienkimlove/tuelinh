<footer class="footer" id="footer">
    <nav class="menu-footer">
        <ul class="fix">
             @foreach ($footerCategories as $cate)
                @if ($cate->slug == 'thong-tin-suc-khoe')
                    <li><a href="{{url('thong-tin-suc-khoe/me-va-be')}}">{{$cate->title}}</a></li>
                @elseif ($cate->slug == 'cam-nang-ve-benh')
                    <li><a href="{{url('dai-cuong-ve-benh')}}">{{$cate->title}}</a></li>
                @else
                    <li><a href="{{url($cate->slug)}}">{{$cate->title}}</a></li>
                @endif
            @endforeach
                        <li><a href="{{url('lien-he')}}" title="">Liên hệ</a></li>
        </ul>
    </nav>
    <div class="fix">
        <div class="copyright">
            BẢN QUYỀN THUỘC VỀ CÔNG TY TUỆ LINH <br>
            Tầng 5 tòa nhà 29T1, phố Hoàng Đạo Thúy, Trung Hòa, Cầu Giấy, Hà Nội <br>
            Điện thoại: (04)62824344 - Fax: (04)62824263 <br>
            Website: www.tuelinh.vn - Email: contact@tuelinh.com <br>
        </div>
    </div>
</footer>