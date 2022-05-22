@extends('layouts.admin')
@section('title',"فن السكن | لوحة التحكم - اعدادات المشاريع")
@section('content')
@php
    $data=json_decode($component['data']);
@endphp
<div class="request">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="my-2" action="{{ route('projectsettings') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="services">
                        <div class="d-flex justify-content-between">
                            <h4>الخدمات الهندسية المطلوبة</h4> 
                            <button type="submit" class="btn btn-primary">اضافة خدمة</button>
                        </div>
                    </div>
                    <input type="hidden" name="head" value="project">
                    <div class="mb-3">
                        <label for="service" class="form-label">نوع الخدمة</label>
                        <input type="text" name="service" class="form-control" id="service">
                    </div>
                    <div class="mb-3">
                        <label for="servicedetails" class="form-label">تفاصيل الخدمة</label>
                        <textarea class="form-control" name="description" id="servicedetails" rows="3"></textarea>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach ($data as $key=>$service)
            <div class="col-md-6">
                <div class="border rounded shadow-sm p-3 m-2 ">
                    <div class="d-flex justify-content-between">   
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="service-{{$loop->index}}">
                            <label class="form-check-label" for="service-{{$loop->index}}">
                                    {{$key}}
                            </label>
                        </div>
                        <a data-bs-toggle="modal" data-bs-target="#serive-{{$loop->index}}-modal" href="http://" data-id="{{$loop->index}}">للتفاصيل أضغط هنا</a>
                        <!-- Modal -->
                        <div class="modal fade" id="serive-{{$loop->index}}-modal" tabindex="-1" 
                        aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable opacity-animate3">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">{{$key}}</h5>
                                    <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    {{$service}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <form action="{{route('serviceoption')}}" method="post">
                        @csrf
                        <input type="hidden" name="head" value="serviceoptions-{{$loop->index}}">
                        <div class="mb-3">
                            <label for="serviceoption" class="form-label">خيارات الخدمة</label>
                            <div class="input-group mb-3">
                                <button class="btn btn-outline-secondary" type="button" id="serviceoption{{$loop->index}}">اضافة خيار</button>
                                <input type="text" class="form-control" name="option{{$loop->index}}" aria-label="Example text with button addon" aria-describedby="serviceoption{{$loop->index}}">
                              </div>
                        </div>
                    </form>
                    <div>
                        @foreach ($options as $option)
                            <div class="card">{{$option->date}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection