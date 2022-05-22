@extends('layouts.admin')
@section('title',"فن السكن | لوحة التحكم - اعدادات المشاريع")
@section('content')
@php
    // $data=json_decode($component['data']);
@endphp
<div class="request">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <h2>طلبات عرض السعر</h2>
                <p>مرحبا بك فى فن السكن .</p>
            </div>
        </div>
        <div class="my-2">
            <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th scope="col">كود</th>
                    <th scope="col">نوع المشروع</th>
                    <th scope="col">العميل</th>
                    <th scope="col">تاريخ الطلب</th>
                    <th scope="col">الحالة</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $key=>$request)
                    @php
                        $data=json_decode($request->request);
                        $type='options-design';
                    @endphp
                    <tr>
                      <th scope="row">{{$request->id}}</th>
                      <th>{{$projectdesign[$data->$type]}}</th>
                      <th>{{$request->user->name}}</th>
                      <td>{{$request->created_at}}</td>
                      <td>
                        @if ($request->state==0)
                            {{"جديد   |  "}}
                        @endif
                        @if ($request->state==1)
                            {{"فى انتظار موافقة العميل   |  "}}
                        @endif
                        @if ($request->state==2)
                            {{"تعيين مهندس المشروع   |  "}}
                        @endif
                        @if ($request->state==3)
                            {{"  جاري العمل علي المشروع   |  "}}
                        @endif
                        <a class="btn btn-link m-auto" href="{{route('project-manage.edit',$request->id)}}">تحرير</a>                      
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="mt-5">
                {{ $requests->links() }}
              </div>
        </div>
    </div>
</div>
@endsection