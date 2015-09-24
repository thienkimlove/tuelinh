<?php

namespace App\Http\Controllers;

use App\City;
use App\Delivery;
use App\Http\Requests;
use App\Http\Requests\DeliveryRequest;
use App\Product;

class DeliveriesController extends BaseController
{
    protected $province, $area, $product;
    public function __construct()
    {
        $areas = ['Miền Bắc', 'Miền Trung', 'Miền Nam'];
        $this->area = [];
        $this->province = City::lists('name', 'id');
        $this->product = Product::lists('name', 'id');
        foreach ($areas as $area) {
            $this->area[$area] = $area;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $deliveries = Delivery::all();
        return view('admin.delivery.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cities = $this->province;
        $products = $this->product;
        $areas = $this->area;
        return view('admin.delivery.form', compact('cities', 'areas', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return Response
     */
    public function store(DeliveryRequest $request)
    {
        $data = $request->all();
        Delivery::create($data);
        flash(trans('common.delivery_create_success'), 'success');
        return redirect('admin/deliveries');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $cities = $this->province;
        $areas = $this->area;
        $products = $this->product;
        $delivery = Delivery::find($id);
        return view('admin.delivery.form', compact('delivery', 'cities', 'areas', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param CategoryRequest $request
     * @return Response
     */
    public function update($id, DeliveryRequest $request)
    {

        $data = $request->all();
        $delivery = Delivery::find($id);
        $delivery->update($data);

        flash(trans('common.delivery_edit_success'), 'success');
        return redirect('admin/deliveries');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $delivery = Delivery::find($id);
        $delivery->delete();
        flash(trans('common.delivery_delete_success'), 'success');
        return redirect('admin/deliveries');
    }
}
