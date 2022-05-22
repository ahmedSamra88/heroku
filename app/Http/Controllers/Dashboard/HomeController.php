<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Models\dashboard\Component;

use App\Traits\Dashboard\ImageTrait;


class HomeController extends Controller
{
    use ImageTrait;

    public function index()
    {
        
        $component=Component::where("name","head")->first();
        return view('dashboard.pages.home')->withComponent($component);
    }
    public function edit(Request $request)
    {
        
        $data = request()->except(['_token','head','section_bg','image_one','image_two']);
        
        $rule=[
            'title'=>['required', 'string', 'max:255'],
            'description'=>['required', 'string']
        ];
        $messages=[
            'title.required'=>"العنوان مطلوب . ",
            'description.required'=>"الوصف مطلوب"
        ];

        // $component= Component::updateOrCreate();
        // Component::where(["title"=>$title])->delete();
        $validator=Validator::make($request->all(),$rule,$messages);


        if (!$validator->fails()) {
            
            $component=Component::where("name",$request->head)->first();

            $files=json_decode($component['data']);
            $section_bg = isset($request->section_bg) ? $this->verifyAndUpload($request, 'section_bg', 'attachments/dashboard') : $files->section_bg;
            $image_one =  isset($request->image_one) ? $this->verifyAndUpload($request, 'image_one', 'attachments/dashboard') : $files->image_one;
            $image_two =  isset($request->image_two) ? $this->verifyAndUpload($request, 'image_two', 'attachments/dashboard') : $files->image_two;
            $data['section_bg']=$section_bg;
            $data['image_one']=$image_one;
            $data['image_two']=$image_two;
            Component::updateOrCreate(
                ["name"=> $request->head],
                ["data"=>json_encode($data)]
            );
        
        }
        // $component=Component::all();
        return redirect()->back()->withErrors($validator)->withInput();//;->withComponent($component);
    }
}
