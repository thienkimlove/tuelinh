<footer class="footer" id="footer">
    <nav class="menu-footer">
        <ul class="fix">
            @foreach ($footerCategories as $cate)
                <li><a href="{{url($cate->slug)}}">{{$cate->title}}</a></li>
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