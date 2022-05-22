<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\File;
use Validator,Redirect,Response;
use App\Http\Requests\StorePojectRequest;
use App\Http\Requests\UpdatePojectRequest;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\Dashboard\ImageTrait;
use App\Models\Bag;

class ProjectController extends Controller
{
    use ImageTrait;

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth','role:client'])->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('project.myprojects');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.request');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePojectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePojectRequest $request)
    {
        
        $data = request()->except(['_token','user_id','suc']);
        
        $rule=[
            'city'=>['required', 'string', 'max:255'],
            'area'=>['required'],
            'options-design'=>['required']
        ];
        $messages=[
            'city.required'=>"نوع المشروع مطلوب . ",
            'city.string'=>"نوع المشروع نص . ",
            'area.required'=>"المساحة مطلوب",
            'options-design.required'=>'نوع التصميم مطلوب'
        ];

        // $component= Component::updateOrCreate();
        // Component::where(["title"=>$title])->delete();
        $validator=Validator::make($request->all(),$rule,$messages);


        if (!$validator->fails()) {
            $data['initialcost']=0;
            $project = new Project;
            $project->user_id=auth()->user()->id;
            $project->request=json_encode($data);
            $project->save();
            // // example:
            // toast('Success Toast','success')->autoClose(5000);
            $suckpath =$this->verifyAndUpload($request, 'suc', 'attachments/project');
            $file=new File;
            $file->name="الصك";
            $file->path=$suckpath;
            $file->project_id=$project->id;
            $file->save();
            Alert::success('تم اضافة طلب عرض السعر بنجاح .', '')->showConfirmButton($btnText = 'تم', $btnColor = '#B8E258');

        }
        return redirect()->back()->withErrors($validator)->withInput();//;->withComponent($component);

    }
    public function approved($id)
    {
        return view("project.costapproved")->withID($id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePojectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function postapproved(StorePojectRequest $request)
    {
        
        $data = request()->except(['_token','user_id','project_id','area','uid','suc']);
        
        $rule=[
            'mokht'=>['required'],
            'kt3a'=>['required'],
            'ab3ad'=>['required']
        ];
        $messages=[
            'mokht.required'=>"المخطط مطلوب . ",
            'ab3ad.required'=>"ابعاد الارض مطلوبه .",
            'kt3a.required'=>'رقم القطعة مطلوب .'
        ];

        // $component= Component::updateOrCreate();
        // Component::where(["title"=>$title])->delete();
        $validator=Validator::make($request->all(),$rule,$messages);


        if (!$validator->fails()) {
            $project =Project::find($request->project_id);
            $project->details=json_encode($data);
            $project->state=2;
            $project->save();
            $area =$this->verifyAndUpload($request, 'area', 'attachments/project');
            $file=new File;
            $file->name="الرفع المساحي";
            $file->path=$area;
            $file->project_id=$project->id;
            $file->save();
            $you =$this->verifyAndUpload($request, 'uid', 'attachments/project');
            $file=new File;
            $file->name="الهوية الوطنية";
            $file->path=$you;
            $file->project_id=$project->id;
            $file->save();
            $suc =$this->verifyAndUpload($request, 'suc', 'attachments/project');
            $file=new File;
            $file->name="تأكيد الصك";
            $file->path=$suc;
            $file->project_id=$project->id;
            $file->save();
            // // example:
            // toast('Success Toast','success')->autoClose(5000);
            Alert::success('شكرا على قبول العرض سيتم التواصل معك من قبل المهندس المعين للمشروع الخاص بك .', '')->showConfirmButton($btnText = 'تم', $btnColor = '#B8E258');
            return view('project.myprojects');

        }
        return redirect()->back()->withErrors($validator)->withInput();//;->withComponent($component);
        

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poject  $poject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request=Project::find($id);
        
        if (request('resourcePath') && request('id')) {
            $bag =Bag::find(request('bag'));
            if (!$bag->state) {                
                $url = "https://eu-test.oppwa.com/v1/checkouts/".request('id')."/payment";
                $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";
            
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $responseData = curl_exec($ch);
                if(curl_errno($ch)) {
                    return curl_error($ch);
                }
                curl_close($ch);
                $res = json_decode($responseData);
                $bag->state=1;
                $bag->save();
                Alert::success('تم الدفع بنجاح .', '')->showConfirmButton($btnText = 'تم', $btnColor = '#B8E258');
            }
        }
        return view('project.single')->withRequest($request);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poject  $poject
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                    "&amount=".$request->cost .
                    "&currency=EUR" .
                    "&paymentType=DB";
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData=json_decode($responseData);
        $request['pay_id']=$responseData->id;

        // http://127.0.0.1:8000/projects/13?id=0F913E5E3AF6A7E48A19C5A5C985F2FD.uat01-vm-tx03&resourcePath=%2Fv1%2Fcheckouts%2F0F913E5E3AF6A7E48A19C5A5C985F2FD.uat01-vm-tx03%2Fpayment

        return view('project.payment')->withRequest($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poject  $poject
     * @return \Illuminate\Http\Response
     */
    public function edit(Poject $poject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePojectRequest  $request
     * @param  \App\Models\Poject  $poject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePojectRequest $request, Poject $poject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poject  $poject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        Alert::success('تم حذف المشروع', '')->showConfirmButton($btnText = 'تم', $btnColor = '#B8E258');
        return view('project.request');    }

}
