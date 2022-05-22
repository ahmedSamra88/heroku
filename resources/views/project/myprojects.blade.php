@extends('layouts.app')
@section('title',"فن السكن | كل المشاريع")
@section('content')
@if (Auth::user()->role=="eng")
    @php
        $myprojects=Auth::user()->engprojects;
    @endphp
@else
  @php
    $myprojects=Auth::user()->projects;
  @endphp
@endif
<div class="request content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <h2>كل المشاريع </h2>
                <p>مرحبا بك فى فن السكن .</p>
            </div>
        </div>
        @if (count($myprojects))
        <div class="shadow my-2">
            <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th scope="col">كود</th>
                    <th scope="col">نوع المشروع</th>
                    <th scope="col">تاريخ الطلب</th>
                    <th scope="col">الحالة</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($myprojects->sortByDesc('id') as $key=>$project)
                    @php
                        $data=json_decode($project->request);
                        $type='options-design';
                    @endphp
                    <tr>
                      <th scope="row">{{$project->id}}</th>
                      <th>{{$projectdesign[$data->$type]}}</th>
                      <td>{{$project->created_at}}</td>
                      <td>
                        @if ($project->state==0)
                            {{"فى انتظار عرض السعر    |  "}}
                        @endif
                        @if ($project->state==1)
                            {{"فى انتظار الموافقة    |  "}}
                        @endif
                        @if ($project->state==2)
                            {{" جاري تعيين المهندس|  "}}
                        @endif
                        @if ($project->state==3)
                            {{"  جاري العمل علي المشروع   |  "}}
                        @endif
                       <a class="btn btn-link m-auto" href="{{route('projects.show',$project->id)}}">تحرير</a></td>                            
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="mt-5">
                {{-- {{ Auth::user()->projects->links() }} --}}
              </div>
        </div>
        @else
            <div class="col-12 my-5">
              <p class="text-muted text-center">ليس لديك مشاريع حالية.</p>
            </div>
        @endif
    </div>
</div>
@endsection