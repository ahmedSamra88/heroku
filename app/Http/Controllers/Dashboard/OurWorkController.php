<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\OurWork;
use Illuminate\Http\Request;

class OurWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allwork=OurWork::all();
        return view("dashboard.pages.ourwork")->withOurworks($allwork);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allwork=OurWork::all();
        return view("dashboard.pages.ourwork")->withWorks($allwork);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
            
            $url=$this->verifyAndUpload($request, 'img_url', 'attachments/dashboard');
            OurWork::Create(
                ["title"=> $request->title],
                ["description"=>$request->description],
                ["image_url"=>$url]
            );
        
        }
        // $component=Component::all();
        return redirect()->back()->withErrors($validator)->withInput();//;->withComponent($component);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OurWork  $ourWork
     * @return \Illuminate\Http\Response
     */
    public function show(OurWork $ourWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurWork  $ourWork
     * @return \Illuminate\Http\Response
     */
    public function edit(OurWork $ourWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurWork  $ourWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OurWork $ourWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurWork  $ourWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurWork $ourWork)
    {
        //
    }
}
