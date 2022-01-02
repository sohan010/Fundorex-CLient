<?php

namespace App\Http\Controllers\Admin;

use App\Cause;
use App\CauseCategory;
use App\CauseUpdate;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class CauseCommentController extends Controller
{
    private const BASE_PATH = 'backend.donations.';

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function all_cause_comment($id){
        $all_comments = Comment::where(['cause_id' => $id])->get();
        return view(self::BASE_PATH.'cause-comment')->with([
            'all_comments' => $all_comments,
        ]);
    }

    public function delete_cause_comment(Request $request,$id){
        Comment::findOrFail($id)->delete();
        return redirect()->back()->with(['msg' => __('item deleted'),'type' => 'danger']);
    }

    public function bulk_action(Request $request){
        $all = Comment::findOrFail($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }


}
