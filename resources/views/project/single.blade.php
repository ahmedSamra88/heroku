@extends('layouts.app')
@section('title',"فن السكن | اعدادات المشاريع")
@section('content')
@php
    // $data=json_decode($component['data']);
@endphp
<style>
    #navbar-project{
        z-index: 0 !important;
    }
    .request .nav-link,
    .request .nav-link.active{
        background: none !important;
        color: #000000 !important;
        font-weight: bold;
    }
</style>
<div class="request content">
    <nav id="navbar-project" class="navbar px-3 sticky-top  navbar-light bg-light  border-bottom bg-white text-dark">
        {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link" href="#request">عرض السعر</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#details">تفاصيل المشروع</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#files">ملفات المشروع</a>
          </li>
          @if (Auth::user()->role=="client")
          <li class="nav-item">
            <a href="#payment" class="nav-link position-relative">
                الفواتير
                <span class="position-absolute top-0 end-50 translate-middle badge rounded-pill bg-danger">
                    @if (count($request->bags->where("state","0")))
                    {{count($request->bags->where("state","0")) - 1}}
                    @endif
                </span>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="#review">مراجعة وتقييم </a>
          </li>
        </ul>
    </nav>
    <div data-bs-spy="scroll" data-bs-target="#navbar-project" data-bs-offset="0" class="scrollspy-project mt-5" tabindex="0">
        <div class="container"  id="request">
            <div class="shadow my-4 p-4">
                <div class="mt-5">
                    <p>مرحبا بك فى فن السكن .</p>
                    <h2>عرض السعر</h2>
                    @if ($request->state==0)
                        {{"فى انتظار عرض السعر    |  "}}
                    @endif
                    @if ($request->state==1)
                        {{"فى انتظار الموافقة    |  "}}
                    @endif
                    @if ($request->state==2)
                        {{" جاري تعيين المهندس|  "}}
                    @endif
                    @if ($request->state==3)
                        {{"  جاري العمل علي المشروع   |  "}}
                    @endif
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th scope="col">كود</th>
                        <th scope="col">نوع المشروع</th>
                        <th scope="col">تاريخ الطلب</th>
                        <th scope="col">عرض السعر</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $data=json_decode($request->request);
                            $details=json_decode($request->details);
                            $type='options-design';
                        @endphp
                        <tr>
                        <th scope="row">{{$request->id}}</th>
                        <th>{{$projectType[$data->$type]}}</th>
                        <td>{{$request->created_at}}</td>
                        <td class="d-flex justify-content-around align-items-center">
                            @if ($request->state==0)
                                {{"فى انتظار عرض السعر    |  "}}
                            @endif
                            @if ($request->state==1)
                                <span class="fw-bold">{{$request->bags[0]->cost}} ر.س </span>
                                {{" |  "}}
                                <a href="{{route('approvedRequest',$request->id)}}" class="btn btn-link">قبول عرض السعر</a>                               
                            @endif
                            @if ($request->state==2)
                                {{" جاري تعيين المهندس  "}}
                            @endif
                            @if ($request->state==3)
                                {{"  جاري العمل علي المشروع    "}}
                            @endif
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container"  id="details">
            <div class="shadow my-4 p-4">
            <h2 class="my-5">تفاصيل المشروع</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <span class="rounded-circle border d-flex justify-content-center align-items-center" style="width:45px;height:45px;"><i class="fa-solid fa-envelope"></i></span> 
                        </div>
                        <div class="flex-grow-1 ms-3 px-2">
                            <h4>نوع التصميم</h4>
                            <p class="text-muted">
                                @php
                                    $design='options-design';
                                @endphp
                                {{$projectdesign[$data->$design]}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <span class="rounded-circle border d-flex justify-content-center align-items-center" style="width:45px;height:45px;"><i class="fa-solid fa-envelope"></i></span> 
                        </div>
                        <div class="flex-grow-1 ms-3 px-2">
                            <h4>نوع المشروع</h4>
                            <p class="text-muted">
                                @php
                                    $type='project-type';
                                @endphp
                                {{$projectType[$data->$type]}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <span class="rounded-circle border d-flex justify-content-center align-items-center" style="width:45px;height:45px;"><i class="fa-solid fa-envelope"></i></span> 
                        </div>
                        <div class="flex-grow-1 ms-3 px-2">
                            <h4>المدينة</h4>
                            <p class="text-muted">
                                {{$data->city}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <span class="rounded-circle border d-flex justify-content-center align-items-center" style="width:45px;height:45px;"><i class="fa-solid fa-envelope"></i></span> 
                        </div>
                        <div class="flex-grow-1 ms-3 px-2">
                            <h4>مساحة الأرض</h4>
                            <p class="text-muted">
                                {{$data->area}} م.مربع
                            </p>
                        </div>
                    </div>
                </div>
                @if (isset($details))
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <span class="rounded-circle border d-flex justify-content-center align-items-center" style="width:45px;height:45px;"><i class="fa-solid fa-envelope"></i></span> 
                            </div>
                            <div class="flex-grow-1 ms-3 px-2">
                                <h4>رقم المخطط</h4>
                                <p class="text-muted">
                                    {{$details->mokht}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <span class="rounded-circle border d-flex justify-content-center align-items-center" style="width:45px;height:45px;"><i class="fa-solid fa-envelope"></i></span> 
                            </div>
                            <div class="flex-grow-1 ms-3 px-2">
                                <h4>رقم القطعة</h4>
                                <p class="text-muted">
                                    {{$details->kt3a}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <span class="rounded-circle border d-flex justify-content-center align-items-center" style="width:45px;height:45px;"><i class="fa-solid fa-envelope"></i></span> 
                            </div>
                            <div class="flex-grow-1 ms-3 px-2">
                                <h4>ابعاد الارض</h4>
                                <p class="text-muted">
                                    {{$details->ab3ad}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @isset($details->direction)
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <span class="rounded-circle border d-flex justify-content-center align-items-center" style="width:45px;height:45px;"><i class="fa-solid fa-envelope"></i></span> 
                            </div>
                            <div class="flex-grow-1 ms-3 px-2">
                                <h4>اتجاهات الواجهة</h4>
                                <p class="text-muted">
                                    @php
                                        $direction='direction';
                                    @endphp
                                    @foreach ($details->$direction as $dir)
                                        {{ $views[$dir]}} ,
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                    @endisset
                    @isset($details->model)
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <span class="rounded-circle border d-flex justify-content-center align-items-center" style="width:45px;height:45px;"><i class="fa-solid fa-envelope"></i></span> 
                            </div>
                            <div class="flex-grow-1 ms-3 px-2">
                                <h4>طراز التصميم</h4>
                                <p class="text-muted">
                                    {{$designmodel[$details->model]}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endisset
                </div>
                @endif
            </div>
            
            @if (isset($data->service))
            <div class="services pt-3">
                <h2>الخدمات الهندسية المطلوبة</h2>
                <div class="row">
                    @php
                        $serviceneeded=$data->service;
                    @endphp
                    @foreach ($serviceneeded as $item)
                        @if ($services[$item] != "")
                            <div class="col-md-6">
                                <div class="border rounded shadow-sm p-3 m-2 d-flex justify-content-between">{{$services[$item]}}</div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>  
            @endif
            </div>
        </div>
        <div class="container" id="files">
            <div class="shadow my-4 p-4">
                <h2>الملحقات</h2>
                <div class="row">
                    @foreach ($request->files as $file)
                    <div class="col-md-4 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <span class="rounded-circle border d-flex justify-content-center align-items-center" style="width:45px;height:45px;"><i class="fa-solid fa-file"></i></span> 
                            </div>
                            <div class="flex-grow-1 ms-3 px-2">
                                <a target="_blank" href="/attachments/project/{{$file->path}}">{{$file->name}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        @if (Auth::user()->role=="client")
        <div class="container" id="payment">
            <div class="shadow my-4 p-4">
                <h3 class="text-muted">الفواتير</h3>
                <table class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th scope="col"> كود الفاتورة </th>
                        <th scope="col"> مبلغ الفاتورة</th>
                        <th scope="col">حالة الفاتورة</th>
                        <th scope="col">تاريخ الطلب</th>
                        <th scope="col">تاريخ الدفع</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($request->bags as $bag)
                        @php
                            if($loop->first) continue;
                        @endphp
                        <tr>
                            <td>{{$bag->id}}</td>
                            <td>{{$bag->cost}}</td>
                            <td>{{$bag->state?"مدفوعة":"لم تسدد"}}</td>
                            <td>{{$bag->created_at}}</td>
                            <td>
                                @if ($bag->created_at == $bag->updated_at || $bag->state == 0)
                                    <a href="{{route('payment',['id'=>$bag->id,"cost"=>$bag->cost,'project_id'=>$request->id])}}">دفع الفاتورة</a>
                                @else
                                {{$bag->updated_at}}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        @if ($request->state == 5)
        <div class="container" id="review">
            <div class="shadow my-4 p-4">
                <h2>تقييم العمل</h2>
            </div>
        </div>
        @endif
    </div>
</div>
<div class="chat">
    @include('include.chat.realtimechat-firebase')
</div>
@endsection