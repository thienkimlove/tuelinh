<div class="form-group">
    {!! Form::label('title', 'Tiêu đề') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('type', 'Chọn thư mục cho bài') !!}
    {!! Form::select('type', $types, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Ảnh đại diện cho bài viết') !!}
    @if ($post->image)
        <img src="{{url('image-cached/120x120/' . $post->image)}}" />

        <hr>
    @endif
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>



<div class="form-group">
    {!! Form::label('homepage_intro', 'Cho bài viết hiển thị ở trang chủ muc "Intro"') !!}
    {!! Form::checkbox('homepage_intro', null, null) !!}
</div>


<div class="form-group">
    {!! Form::label('homepage_discovery', 'Cho bài viết hiển thị ở trang chủ muc "Discovery"') !!}
    {!! Form::checkbox('homepage_discovery', null, null) !!}
</div>

<div class="form-group">
    {!! Form::label('hot', 'Cho bài viết hiển thị ở mục Tin nổi bật (Cột phải)') !!}
    {!! Form::checkbox('hot', null, null) !!}
</div>

<div class="form-group">
    {!! Form::label('reason', 'Cho bài viết hiển thị ở mục "Lý do LycoEye" (Cột phải)') !!}
    {!! Form::checkbox('reason', null, null) !!}
</div>


<div class="form-group">
     {!! Form::label('desc', 'Mô tả ngắn') !!}
     {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('content', 'Nội dung chính') !!}
     {!! Form::textarea('content', null, ['class' => 'form-control ckeditor']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Từ khóa') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Xuất bản') !!}
    {!! Form::checkbox('status', null, null) !!}
</div>

 <div class="form-group">
        {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
  </div>
@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder : 'Chọn hoặc tạo từ khóa mới',
            tags : true //allow to add new tag which not in list.
        });
    </script>
@endsection
