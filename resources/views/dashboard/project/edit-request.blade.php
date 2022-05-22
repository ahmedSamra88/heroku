@extends('layouts.admin')
@section('title',"فن السكن | لوحة التحكم - اعدادات المشاريع")
@section('content')
@php
    // var_dump($request);
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
                    <th scope="col">عرض السعر</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $data=json_decode($request->request);
                        $type='options-design';
                    @endphp
                    <tr>
                      <th scope="row">{{$request->id}}</th>
                      <th>{{$projectType[$data->$type]}}</th>
                      <th>{{$request->user->name}}</th>
                      <td>{{$request->created_at}}</td>
                      <td>
                          <form action="{{route('project-manage.update',$request->id)}}" method="post">
                              @csrf
                              @method("PUT")
                              <input type="hidden" name="request" value="{{$request->id}}">
                              <input type="text" name="cost" value="{{$request->bags->first()['cost']}}" id="cost">
                          </form>
                      </td>
                    </tr>
                </tbody>
              </table>
              <div class="details">
                        <div class="" role="group">
                            <h4>نوع التصميم</h4>
                            <div class="" for="0-outlined">
                                @php
                                    $design='options-design';
                                @endphp
                                {{$projectdesign[$data->$design]}}</div>
                        </div>
                        <div class="type pt-3">
                            <h4>نوع المشروع </h4>
                            <div class="column">    
                                <div class="form-check ">
                                    <label class="form-check-label" for="type-0">
                                        @php
                                        $type='project-type';
                                        @endphp
                                        {{$projectType[$data->$type]}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3 location row">
                            <div class="mb-3 col-md-6">
                                <label for="city" class="form-label">المدينة</label>
                                <input type="text" class="form-control" name="city" value="{{$data->city}}" id="city">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="areainput" class="form-label">مساحة الأرض</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="area" class="form-control"  aria-label="area" id="areainput" value="{{$data->area}}" aria-describedby="area">
                                    <span class="input-group-text" id="area">متر مربع</span>

                                </div>
                            </div>
                        </div>
                        <div class="services pt-3">
                            <h4>الخدمات الهندسية المطلوبة</h4>
                            <div class="row">
                                @isset($data->service)
                                    <?php $serviceneeded=$data->service;?>
                                    @foreach ($serviceneeded as $item)
                                    <div class="col-md-6">
                                        <div class="border rounded shadow-sm p-3 m-2 d-flex justify-content-between">{{$services[$item]}}</div>
                                    </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
              </div>
        </div>
    </div>
    @if ($request->state > 1)        
    <div class="payments p-4">
        <h3>الفواتير</h3>
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
                    <td>{{$bag->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="new-pay">
            <form action="{{route('bage.store')}}" method="post">
                @csrf
                {{-- @method("PUT") --}}
                <input type="hidden" name="project_id" value="{{$request->id}}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="قيمة الفاتورة" name="cost" aria-describedby="basic-addon2">
                    <button type="submit" class="input-group-text" id="basic-addon2">اضافة فاتورة</button>
                </div>
            </form>
        </div>
    </div>
    @endif

    <div class="new-eng container">
        <h3>تعيين مهندس</h3>
        <form action="{{route("assignEng")}}" method="post">
            {{-- @method('PUT') --}}
            @csrf
            {{-- @method("PUT") --}}
            <input type="hidden" name="id" value="{{$request->id}}">
            <div class="input-group mb-3">                
                <select class="form-select" name="eng_id" aria-describedby="basic-addon2">
                    @foreach ($eng as $eng)
                    <option value="{{$eng->id}}">{{$eng->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="input-group-text" id="basic-addon2">تعيين</button>
            </div>
        </form>
    </div>
</div>
@endsection