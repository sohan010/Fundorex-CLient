<?php

namespace App\Http\Controllers\Admin;

use App\KeyFeatures;
use App\Language;
use Illuminate\Http\Request;

class KeyFeaturesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $all_key_features = KeyFeatures::all()->groupBy('lang');
        return view('backend.pages.key-features')->with([
            'all_key_features' => $all_key_features
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'subtitle' => 'required|string|max:191',
            'title' => 'required|string',
            'icon' => 'required|string',
            'description' => 'string',
            'image' => 'string',
            'lang' => 'required|string|max:191',
            'features' => 'string',
        ]);
        KeyFeatures::create($request->all());
        return redirect()->back()->with(['msg' => __('Item Added...'), 'type' => 'success']);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'subtitle' => 'required|string|max:191',
            'title' => 'required|string',
            'icon' => 'required|string',
            'description' => 'string',
            'image' => 'string',
            'features' => 'string',
            'lang' => 'required|string|max:191',
        ]);
        KeyFeatures::find($request->id)->update($request->all());
        return redirect()->back()->with(['msg' => __('Item Updated...'), 'type' => 'success']);
    }
    public function delete($id)
    {
        KeyFeatures::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Delete Success...'), 'type' => 'danger']);
    }
    public function bulk_action(Request $request)
    {
        $all = KeyFeatures::find($request->ids);
        foreach ($all as $item) {
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
}
