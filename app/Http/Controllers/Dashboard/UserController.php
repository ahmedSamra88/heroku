<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view("dashboard.user.all")->withEngs(User::where('role','eng')->paginate(5));
        return view("dashboard.user.all")->withEngs(User::paginate(5));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.user.new");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->except(['_token']);
        
        $rule=[
            'name'=>['required', 'string', 'max:255'],
            'password'=>['required','password'],
            'phone_number'=>'unique:users'
        ];
        $messages=[
            'name.required'=>"اسم المهندس مطلوب  . ",
            'password.required'=>"ادخل كلمة المرور ",
            'phone_number.unique'=>"رقم الجوال مسجل من قبل ."
        ];
        // $component= Component::updateOrCreate();
        // Component::where(["title"=>$title])->delete();
        $validator=Validator::make($request->all(),$rule,$messages);


        if (!$validator->fails()) {
            User::create([
                'name' => $request['name'],
                'phone_number' => $request['phone_number'],
                'role'=>$request['role'],
                'isVerified'=>1,
                'password' => Hash::make($request['password']),
            ]);
            toast('تم اضافة مستخدم جديد')->position('top-end')->autoClose(5000);
            // return view("dashboard.user.all")->withEngs(User::where('role','eng')->paginate(5));
            return view("dashboard.user.all")->withEngs(User::paginate(5));
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("dashboard.user.edit")->withEng(User::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $user=User::find($id);
        $user->name=$request->name;
        $user->phone_number=$request->phone_number;
        $user->save();
        toast('تم تعديل المستخدم')->position('top-end')->autoClose(5000);
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
        $user= User::find($id);
        $user->delete();
        toast('تم حذف المستخدم')->position('top-end')->autoClose(5000);
        return view("dashboard.user.all")->withEngs(User::paginate(5));
    }
}
