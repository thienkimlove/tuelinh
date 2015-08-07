<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\FriendRequest;
use App\Friend;

class FriendsController extends BaseController {

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $friends = Friend::latest('updated_at')->paginate(10);
        return view('admin.friend.index', compact('friends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.friend.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionRequest $request
     * @return Response
     */
    public function store(FriendRequest $request)
    {
        $data = $request->all();
        $data['image'] = ($request->file('image') && $request->file('image')->isValid()) ? $this->saveImage($request->file('image')) : '';
        Friend::create($data);
        flash('Thêm mới hội đồng thành công!', 'success');
        return redirect('admin/friends');
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
        $friend = Friend::findOrFail($id);
        return view('admin.friend.form', compact('friend'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param QuestionRequest $request
     * @return Response
     */
    public function update($id, FriendRequest $request)
    {
        $friend =  Friend::findOrFail($id);
        $data = $request->all();
        if ($request->file('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->saveImage($request->file('image'), $friend->image);
        }
        $friend->update($data);
        flash('Sửa thành viên hội đồng thành công!', 'success');
        return redirect('admin/friends');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $friend = Friend::findOrFail($id);
        if (file_exists(public_path('files/images/' . $friend->image))) {
            @unlink(public_path('files/images/' . $friend->image));
        }
        $friend->delete();

        flash('Xoá thành viên hội đồng thành công!');
        return redirect('admin/friends');
    }
}
