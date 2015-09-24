@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{trans('common.delivery')}}</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('common.delivery_list_city_label')}}</th>
                                <th>Product</th>
                                <th>{{trans('common.delivery_list_title_label')}}</th>
                                <th>{{trans('common.delivery_list_address_label')}}</th>
                                <th>{{trans('common.delivery_list_phone_label')}}</th>
                                <th>{{trans('common.delivery_list_area_label')}}</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deliveries as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->city->name}}</td>
                                <td>{{$cat->product->name}}</td>
                                <td>{{$cat->title}}</td>
                                <td>{{$cat->address}}</td>
                                <td>{{$cat->phone}}</td>
                                <td>{{$cat->area}}</td>
                                <td>
                                    <button id-attr="{{$cat->id}}" class="btn btn-primary btn-sm edit-delivery" type="button">{{trans('common.button_edit')}}</button>&nbsp;
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.deliveries.destroy', $cat->id]]) !!}
                                    <button type="submit" class="btn btn-danger btn-mini">{{trans('common.button_delete')}}</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-primary add-delivery" type="button">{{trans('common.button_add')}}</button>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
@endsection

@section('footer')
    <script>
        $(function(){
            $('.add-delivery').click(function(){
                window.location.href = window.baseUrl + '/admin/deliveries/create';
            });
            $('.edit-delivery').click(function(){
                window.location.href = window.baseUrl + '/admin/deliveries/' + $(this).attr('id-attr') + '/edit';
            });
        });
    </script>
@endsection