<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Counterup;
use App\Helpers\FlashMsg;
use Illuminate\Http\Request;

class CounterUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:counterup-list|counterup-create|counterup-edit|counterup-delete',['only' => 'index']);
        $this->middleware('permission:counterup-create',['only' => 'store']);
        $this->middleware('permission:counterup-edit',['only' => 'update']);
        $this->middleware('permission:counterup-delete',['only' => 'delete','bulk_action']);
    }

    public function index(){
        $all_counterups = Counterup::all();
        return view('backend.pages.counterup')->with([
            'all_counterups' => $all_counterups,
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'icon' => 'required|string',
            'title' => 'required|string|max:191',
            'number' => 'required|string|max:191',
            'extra_text' => 'nullable|string|max:191'
        ]);

        Counterup::create([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'number'=>$request->number,
            'extra_text'=>$request->extra_text,
        ]);

        return redirect()->back()->with(FlashMsg::item_new('New Counterup Item Added....'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'icon' => 'required|string',
            'title' => 'required|string|max:191',
            'number' => 'required|string|max:191',
            'extra_text' => 'nullable|string|max:191'
        ]);

        Counterup::find($request->id)->update([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'number'=>$request->number,
            'extra_text'=>$request->extra_text,
        ]);

        return redirect()->back()->with(FlashMsg::item_update('Counterup Item Updated....'));
    }

    public function delete(Request $request, $id){
        Counterup::find($id)->delete();
        return redirect()->back()->with(FlashMsg::settings_delete('Counterup Item Deleted....'));
    }

    public function bulk_action(Request $request){
        $all = Counterup::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
}
