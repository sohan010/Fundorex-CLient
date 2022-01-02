<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Language;
use App\TeamMember;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TeamMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:team-member-list|team-member-create|team-member-edit|team-member-delete',['only' => 'index']);
        $this->middleware('permission:team-member-create',['only' => 'store']);
        $this->middleware('permission:team-member-edit',['only' => 'update','clone']);
        $this->middleware('permission:team-member-delete',['only' => 'delete','bulk_action']);
    }

    public function index()
    {
        $all_team_member = TeamMember::latest()->get();
        return view('backend.pages.team-member')->with('all_team_member', $all_team_member);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'designation' => 'required|string|max:191',
            'image' => 'nullable|string|max:191',
            'icon_one' => 'nullable|string|max:191',
            'icon_two' => 'nullable|string|max:191',
            'icon_three' => 'nullable|string|max:191',
            'icon_one_url' => 'nullable|string|max:191',
            'icon_two_url' => 'nullable|string|max:191',
            'icon_three_url' => 'nullable|string|max:191'
        ]);
        TeamMember::create($request->all());

        return redirect()->back()->with(['msg' => __('Added...'), 'type' => 'success']);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'designation' => 'required|string|max:191',
            'image' => 'nullable|string|max:191',
            'icon_one' => 'nullable|string|max:191',
            'icon_two' => 'nullable|string|max:191',
            'icon_three' => 'nullable|string|max:191',
            'icon_one_url' => 'nullable|string|max:191',
            'icon_two_url' => 'nullable|string|max:191',
            'icon_three_url' => 'nullable|string|max:191'
        ]);
        TeamMember::findOrFail($request->id)->update($request->all());

        return redirect()->back()->with(['msg' => __('Updated...'), 'type' => 'success']);
    }

    public function delete($id)
    {
       TeamMember::findOrFail($id)->delete();
        return redirect()->back()->with(['msg' => __('Delete Success...'), 'type' => 'danger']);
    }
    public function clone(Request $request)
    {
       $team = TeamMember::findOrFail($request->item_id);
       TeamMember::create([
            'name' => $team->name,
            'designation' => $team->designation,
            'description' => $team->description,
            'image' => $team->image,
            'icon_one' => $team->icon_one,
            'icon_two' => $team->icon_two,
            'icon_three' => $team->icon_three,
            'icon_one_url' => $team->icon_one_url,
            'icon_two_url' => $team->icon_two_url,
            'icon_three_url' => $team->icon_three_url,
       ]);
        return redirect()->back()->with(['msg' => __('Clone Success...'), 'type' => 'success']);
    }

    public function bulk_action(Request $request){
        $all = TeamMember::findOrFail($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
}
