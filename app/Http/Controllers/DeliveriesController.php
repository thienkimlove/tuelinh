<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Http\Requests;
use App\Http\Requests\DeliveryRequest;
use Illuminate\Support\Str;

class DeliveriesController extends BaseController
{
    protected $province, $area;
    public function __construct()
    {
        $provinces = array(
            'An Giang', 'Bà Rịa - Vũng Tàu',
            'Bắc Giang', 'Bắc Kạn', 'Bạc Liêu',
            'Bắc Ninh', 'Bến Tre', 'Bình Định',
            'Bình Dương', 'Bình Phước', 'Bình Thuận',
            'Cà Mau', 'Cao Bằng', 'Đắk Lắk',
            'Đắk Nông', 'Điện Biên', 'Đồng Nai',
            'Đồng Tháp', 'Gia Lai', 'Hà Giang',
            'Hà Nam', 'Hà Tĩnh', 'Hải Dương',
            'Hậu Giang', 'Hòa Bình', 'Hưng Yên',
            'Khánh Hòa', 'Kiên Giang', 'Kon Tum',
            'Lai Châu', 'Lâm Đồng', 'Lạng Sơn',
            'Lào Cai', 'Long An', 'Nam Định',
            'Nghệ An', 'Ninh Bình', 'Ninh Thuận',
            'Phú Thọ', 'Quảng Bình', 'Quảng Nam',
            'Quảng Ngãi', 'Quảng Ninh', 'Quảng Trị',
            'Sóc Trăng', 'Sơn La', 'Tây Ninh',
            'Thái Bình', 'Thái Nguyên', 'Thanh Hóa',
            'Thừa Thiên Huế', 'Tiền Giang', 'Trà Vinh',
            'Tuyên Quang', 'Vĩnh Long', 'Vĩnh Phúc',
            'Yên Bái', 'Phú Yên'
        );

        $areas = ['Miền Bắc', 'Miền Trung', 'Miền Nam'];
        $this->area = [];
        $this->province = [];
        foreach ($provinces as $province) {
            $this->province[$province] = $province;
        }
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
        $areas = $this->area;
        return view('admin.delivery.form', compact('cities', 'areas'));
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
        $data['slug'] = Str::slug($data['city']);
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
        $delivery = Delivery::find($id);
        return view('admin.delivery.form', compact('delivery', 'cities', 'areas'));
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
        $data['slug'] = Str::slug($data['city']);

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
