<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\AppointmentCategoryLang;
use App\AppointmentLang;
use App\BlogCategoryLang;
use App\BlogLang;
use App\Counterup;
use App\HeaderSlider;
use App\Http\Controllers\Controller;
use App\KeyFeatures;
use App\Language;
use App\PageLang;
use App\PricePlanLang;
use App\StaticOption;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:language-list|language-edit|language-create|language-delete',['only' => ['index']]);
        $this->middleware('permission:language-create',['only' => ['store']]);
        $this->middleware('permission:language-edit',['only' => ['backend_edit_words','frontend_edit_words','update_words','update','add_new_string']]);
        $this->middleware('permission:language-delete',['only' => ['delete']]);
    }

    public function index()
    {
        $all_lang = Language::all();
        return view('backend.languages.index')->with([
            'all_lang' => $all_lang
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' =>  'required|string:max:191',
            'direction' =>  'required|string:max:191',
            'slug' => 'required|string:max:191',
            'status' => 'required|string:max:191',
        ]);
        Language::create([
            'name' => $request->name,
            'direction' => $request->direction,
            'slug' => $request->slug,
            'status' => $request->status,
            'default' => 0
        ]);
        //generate admin panel string
        $backend_default_lang_data = file_get_contents(resource_path('lang') . '/backend_default.json');
        file_put_contents(resource_path('lang/') . $request->slug . '_backend.json', $backend_default_lang_data);
        //generate frontend sting
        $frontend_default_lang_data = file_get_contents(resource_path('lang') . '/frontend_default.json');
        file_put_contents(resource_path('lang/') . $request->slug . '_frontend.json', $frontend_default_lang_data);

        return redirect()->back()->with([
            'msg' => __('New Language Added Success...'),
            'type' => 'success'
        ]);
    }

    public function backend_edit_words($slug)
    {
        $backend_lang_file_path = resource_path('lang/') . $slug . '_backend.json';
        if (!file_exists($backend_lang_file_path)) {
            file_put_contents($backend_lang_file_path, file_get_contents(resource_path('lang/') . 'backend_default.json'));
        }

        $all_word = file_get_contents($backend_lang_file_path);

        return view('backend.languages.edit-words')->with([
            'all_word' => json_decode($all_word),
            'lang_slug' => $slug,
            'type' => 'backend'
        ]);
    }
    public function frontend_edit_words($slug)
    {
        $frontend_lang_file_path = resource_path('lang/')  . $slug . '_frontend.json';
        if (!file_exists($frontend_lang_file_path)) {
            file_put_contents($frontend_lang_file_path, file_get_contents(resource_path('lang/') . 'frontend_default.json'));
        }
 
        $all_word = file_get_contents($frontend_lang_file_path);
        return view('backend.languages.edit-words')->with([
            'all_word' => json_decode($all_word),
            'lang_slug' => $slug,
            'type' => 'frontend'
        ]);
    }

    public function update_words(Request $request, $id)
    {
        $lang = Language::where('slug', $id)->first();
        $content = json_encode($request->word);
        if ($content === 'null') {
            return back()->with(['msg' => __('Please fill one minimum one field'), 'type' => 'danger']);
        }
        file_put_contents(resource_path('lang/') . $lang->slug . '_' . $request->type . '.json', $content);
        return back()->with(['msg' => __('Words Change Success'), 'type' => 'success']);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable|string:max:191',
            'direction' => 'nullable|string:max:191',
            'status' => 'nullable|string:max:191',
            'slug' => 'nullable|string:max:191'
        ]);
        Language::where('id', $request->id)->update([
            'name' => 'English (UK)',
            'direction' => $request->direction,
            'status' => $request->status,
            'slug' => $request->slug
        ]);
        $backend_lang_file_path = resource_path('lang/') . $request->slug . '_backend.json';
        $frontend_lang_file_path = resource_path('lang/')  . $request->slug . '_frontend.json';
        if (!file_exists($backend_lang_file_path)) {
            file_put_contents(resource_path('lang/') . $request->slug . '_backend.json', file_get_contents(resource_path('lang/') . 'backend_default.json'));
        }
        if (!file_exists($frontend_lang_file_path)) {
            file_put_contents(resource_path('lang/') . $request->slug . '_frontend.json', file_get_contents(resource_path('lang/') . 'frontend_default.json'));
        }

        return redirect()->back()->with([
            'msg' => __('Language Update Success...'),
            'type' => 'success'
        ]);
    }


    public function add_new_string(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required',
            'string' => 'required',
            'translate_string' => 'required',
        ]);
        if (file_exists(resource_path('lang/') . $request->slug . '_' . $request->type . '.json')) {
            $default_lang_data = file_get_contents(resource_path('lang') . '/' . $request->slug . '_' . $request->type . '.json');
            $default_lang_data = (array) json_decode($default_lang_data);
            $default_lang_data[$request->string] = $request->translate_string;
            $default_lang_data = (object) $default_lang_data;
            $default_lang_data =   json_encode($default_lang_data);
            file_put_contents(resource_path('lang/') . $request->slug . '_' . $request->type . '.json', $default_lang_data);
        }
        return redirect()->back()->with([
            'msg' => __('new translated string added..'),
            'type' => 'success'
        ]);
    }

    public function delete(Request $request, $id){
        $lang = Language::find($id);

        if (file_exists(resource_path('lang/') . $lang->slug . '_backend.json')){
            unlink(resource_path('lang/') . $lang->slug . '_backend.json');
        }
        if (file_exists(resource_path('lang/') . $lang->slug . '_frontend.json')){
            unlink(resource_path('lang/') . $lang->slug . '_frontend.json');
        }

        $lang->delete();

        return redirect()->back()->with([
            'msg' => __('Language Delete Success...'),
            'type' => 'danger'
        ]);

    }
}
