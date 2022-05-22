@extends('layouts.app')
@section('title',"فن السكن | اعتماد عرض سعر")
@section('content')
<div class="request">
    <div class="container">
        <h2>تعبئة البيانات بعد اعتماد المشروع</h2>
        <div class="row">
            <div class="col-12">
                <form class="my-5" action="{{route('postapprovedRequest')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="project_id" value="{{$iD}}">
                    <div class="pt-3 location row">
                        <div class="mb-3 col-md-4">
                            <label for="mokt" class="form-label">رقم المخطط</label>
                            <input type="text" class="form-control" name="mokht" id="mokht">
                            
                            @error('mokht')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="kt3a" class="form-label">رقم القطعة</label>
                            <div class="input-group mb-3">
                                <input type="text" name="kt3a" class="form-control" id="kt3a">
                              </div>
                              @error('kt3a')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="ab3ad" class="form-label">ابعاد الأرض</label>
                            <div class="input-group mb-3">
                                <input type="text" name="ab3ad" class="form-control" id="ab3ad">
                              </div>
                              @error('ab3ad')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="area" class="form-label" >ارفاق الرفع المساحي</label>
                            <input type="file" name="area" class="form-control" id="area">
                            @error('area')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="uid" class="form-label" >ارفاق صورة البطاقة</label>
                            <input type="file" name="uid" class="form-control" id="uid">
                            @error('uid')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="suc" class="form-label" >ارفاق الصك</label>
                            <input type="file" name="suc" class="form-control" id="suc">
                            @error('suc')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="directions pt-3">
                        <h4>اتجاهات الواجهة</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class=" rounded  p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="0" name="direction[]" id="direction-0">
                                        <label class="form-check-label" for="direction-0">
                                             شمالية
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" rounded  p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="direction[]" id="direction-1">
                                        <label class="form-check-label" for="direction-1">
                                             شرقية
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" rounded  p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="2" name="direction[]" id="direction-2">
                                        <label class="form-check-label" for="direction-2">
                                             جنوبية
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" rounded  p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="3" name="direction[]" id="direction-3">
                                        <label class="form-check-label" for="direction-3">
                                             غربية
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="model pt-3">
                        <h4> طراز المشروع</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class=" rounded  p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="0" name="model" id="model-0">
                                        <label class="form-check-label" for="model-0">
                                             كلاسيك
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" rounded  p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1" name="model" id="model-1">
                                        <label class="form-check-label" for="model-1">
                                             نيو كلاسيك
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" rounded  p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="2" name="model" id="model-2">
                                        <label class="form-check-label" for="model-2">
                                             مودرن
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" rounded  p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="3" name="model" id="model-3">
                                        <label class="form-check-label" for="model-3">
                                             آخرى
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-4">اعتماد عرض السعر</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection