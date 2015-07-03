@extends('admin')

@section('content')
  @include('admin.post.heading')
  <div class="row">
      <div class="col-lg-6">
          <h2>Sửa bài "{{ $post->title }}"</h2>
          {!! Form::model($post, ['method' => 'PATCH', 'route' => ['admin.posts.update', $post->id], 'files' => true]) !!}
              @include('admin.post.form', ['submitText' => 'Sửa bài'])
          {!! Form::close() !!}
          @include('errors.list')

      </div>
  </div>
@stop