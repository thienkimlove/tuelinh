@extends('admin')
@section('content')
    @include('admin.category.heading')
    <div class="row" data-ng-controller="PostIndex">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="input-group custom-search-form">
                        <input type="text" data-ng-model="postTitle" class="form-control" placeholder="Search post..">
                                <span class="input-group-btn">
                                <button class="btn btn-default" data-ng-click="searchPost($event, {{$category->id}})" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Desc</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Nổi bật</th>
                                <th>Cột phải</th>
                                <th>Published?</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->desc}}</td>
                                <td> <img src="{{url('image-cached/size1/' .$post->image)}}" /> </td>
                                <td>{{$post->category->name}}</td>
                                <td>{{($post->hot) ? 'Yes' : 'No'}}</td>
                                <td>{{($post->right) ? 'Yes' : 'No'}}</td>
                                <td>{{($post->status) ? 'Yes' : 'No'}}</td>

                                <td>
                                    <button class="btn btn-primary btn-sm" data-ng-click="goUrl('/posts/{{$post->id}}/edit')" type="button">Edit</button>&nbsp;
                                    <br>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.posts.destroy', $post->id]]) !!}
                                    <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="row">

                        <div class="col-sm-6">{!!$posts->render()!!}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"><button class="btn btn-primary" type="button" data-ng-click="goUrl('/posts/create')">Add</button></div>
                    </div>


                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
@endsection