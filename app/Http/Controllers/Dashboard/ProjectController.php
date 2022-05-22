<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Models\dashboard\Component;
use App\Models\Project;
use App\Models\Bag;

use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::orderBy('id','desc')->paginate(15);
        return view("dashboard.project.showall")->withProjects($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request=Project::find($id);
        // if (!$request->state ) { //state=0 in request cost mode
            // return view("dashboard.project.edit-request");
            // return view("dashboard.project.edit-request")->withRequest($request)->withEng(User::where('role',"eng")->get());
        // }else{
            return view("dashboard.project.edit-request")->withRequest($request)->withEng(User::where('role',"eng")->get());;
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bag=Bag::firstOrNew(["title"=>0,"project_id"=>$id]);
        $bag->title=0;
        $bag->project_id=$id;
        $bag->cost=$request->cost;
        $bag->save();
        $project=Project::find($id);
        $project->state=1;
        $project->save();
        toast('تم اضافة عرض السعر')->position('top-end')->autoClose(5000);
        // Alert::success('تم اضافة طلب عرض السعر بنجاح .', '')->showConfirmButton($btnText = 'تم', $btnColor = '#B8E258');

        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showRequests()
    {
        return view("dashboard.project.requests")->withRequests(Project::where('state','0')->paginate(5));
    }

    public function assignEng(Request $request)
    {
        $project=Project::find($request->id);
        $project->eng_id=$request->eng_id;
        $project->state=3;
        $project->save();
        toast('تم تعيين المهندس للمشروع')->position('top-end')->autoClose(5000);

        return redirect()->back()->withInput();
    }
}
