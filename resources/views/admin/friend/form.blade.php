@extends('admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Hội đồng</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-6">
            <h2>Hội đồng thành viên</h2>
            @if(!empty($friend))
            {!! Form::model($friend,['method' => 'PATCH', 'route' => ['admin.friends.update', $friend->id], 'files' => true]) !!}

            @else
            {!! Form::model($friend = new App\Friend,['route' => ['admin.friends.store'], 'files' => true]) !!}
            @endif

            <div class="form-group">
            {!! Form::label('title', 'Tên') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}



            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                @if ($friend->image)
                    <img src="{{url('cache/small/' .$friend->image)}}" />
                    <hr>
                @endif
                {!! Form::file('image', null, ['class' => 'form-control']) !!}
            </div>

             <div class="form-group">
                    {!! Form::label('desc', 'Chức danh') !!}
                    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
             </div>

            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            </div>

            {!! Form::close() !!}
            @include('errors.list')

        </div>
    </div>
@stop