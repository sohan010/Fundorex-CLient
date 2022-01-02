<?php

namespace App\Http\Controllers\Admin;

use App\ClientArea;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientAreaController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
        $this->middleware('permission:client-area-list|client-area-create|client-area-edit|client-area-delete',['only'=> 'index']);
        $this->middleware('permission:client-area-create',['only'=> ['store']]);
        $this->middleware('permission:client-area-edit',['only'=> ['update']]);
        $this->middleware('permission:client-area-delete',['only'=> ['delete','bulk_action']]);
    }

    public function index()
    {
        $all_client_area = ClientArea::latest()->get();
        return view('backend.pages.client-area',compact('all_client_area'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'url' => 'required|string',
            'image' => 'nullable|string',

        ]);

        $data = [
            'title' => $request->sanitize_html('title'),
            'url' => $request->sanitize_html('url'),
            'image' => $request->image,
        ];

        ClientArea::create($data);


        return redirect()->back()->with(FlashMsg::item_new('Client Added Succesfully'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'url' => 'required|string',
            'image' => 'nullable|string',
        ]);

        ClientArea::findOrFail($request->id)->update([
            'title' => $request->sanitize_html('title'),
            'url' => $request->sanitize_html('url'),
            'image' => $request->image,
        ]);

        return redirect()->back()->with([
            'msg' => __('Client Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete(Request $request,$id){
        ClientArea::findOrFail($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Client Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function bulk_action(Request $request){

        ClientArea::whereIn('id',$request->ids)->delete();
        return redirect()->back()->with([
            'msg' => __('Client Delete Success...'),
            'type' => 'danger'
        ]);
    }
}
