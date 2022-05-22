@extends('layouts.admin')
@section('title',"فن السكن | لوحة التحكم - كل المشاريع")
@section('content')
@php
    // $data=json_decode($component['data']);
@endphp
<div class="request">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <h2>كل المشاريع</h2>
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
                    @foreach ($projects as $key=>$project)
                    @php
                        $data=json_decode($project->request);
                        $type='options-design';
                    @endphp
                    <tr>
                      <th scope="row">{{$project->id}}</th>
                      <th>{{$projectdesign[$data->$type]}}</th>
                      <th>{{$project->user->name}}</th>
                      <td>{{$project->created_at}}</td>
                      <td>
                        @if ($project->state==0)
                            {{"جديد   |  "}}
                        @endif
                        @if ($project->state==1)
                            {{"فى انتظار موافقة العميل   |  "}}
                        @endif
                        @if ($project->state==2)
                            {{"تعيين مهندس المشروع   |  "}}
                        @endif
                        @if ($project->state==3)
                            {{"  جاري العمل علي المشروع   |  "}}
                        @endif
                        <a class="btn btn-link m-auto" href="{{route('project-manage.edit',$project->id)}}">تحرير</a>
                      </td>                          
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="mt-5">
                {{ $projects->links() }}
              </div>
        </div>
    </div>
</div>
@endsection