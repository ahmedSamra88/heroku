@extends('layouts.app')
@section('title',"فن السكن | طلب عرض سعر")
@section('content')
<div class="request">
    <div class="container">
        <h2>طلب عرض سعر</h2>
        <div class="row">
            <div class="col-12">
                <form class="my-5" action="{{ route('projects.index') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6 btn-group d-flex justify-content-center" role="group">
                        <input type="radio" class="btn-check" name="options-design" id="0-outlined" autocomplete="off" value="0">
                        <label class="btn btn-outline-dark" for="0-outlined">سكني</label>
                        
                        <input type="radio" class="btn-check" name="options-design" id="1-outlined" autocomplete="off" value="1">
                        <label class="btn btn-outline-dark" for="1-outlined">تجاري</label>

                        <input type="radio" class="btn-check" name="options-design" id="2-outlined" autocomplete="off" value="2">
                        <label class="btn btn-outline-dark" for="2-outlined">سكني / تجاري</label>
                    </div>
                    @error('options-design')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="type pt-3">
                        <h4>نوع المشروع </h4>
                        <div class="column">    
                            <div class="form-check ">
                                <label class="form-check-label" for="type-0">
                                فيلا سكنية 
                                </label>
                                <input class="form-check-input" type="radio" name="project-type" value="0" id="type-0">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="type-1">
                                    فيلا دوبلكس  
                                </label>
                                <input class="form-check-input" type="radio" name="project-type" value="1" id="type-1">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="type-2">
                                    دور ارضي  
                                </label>
                                <input class="form-check-input" type="radio" name="project-type" value="2" id="type-2">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="type-3">
                                    آخرى  
                                </label>
                                <input class="form-check-input" type="radio" name="project-type" value="3" id="type-3">
                            </div>
                        </div>
                    </div>
                    <div class="pt-3 location row">
                        <div class="mb-3 col-md-6">
                            <label for="city" class="form-label">المدينة</label>
                            <input type="text" class="form-control" name="city" id="city">
                            
                            @error('city')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="areainput" class="form-label">مساحة الأرض</label>
                            <div class="input-group mb-3">
                                <input type="text" name="area" class="form-control"  aria-label="area" id="areainput" aria-describedby="area">
                                <span class="input-group-text" id="area">متر مربع</span>

                              </div>
                              @error('area')
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
                    <div class="services pt-3">
                        <h4>الخدمات الهندسية المطلوبة</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="border rounded shadow-sm p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="0" name="service[]" id="service-0">
                                        <label class="form-check-label" for="service-0">
                                            الرفع المساحي
                                        </label>
                                    </div>
                                    <a data-bs-toggle="modal" data-bs-target="#serive-0-modal" href="http://" data-id="0">للتفاصيل أضغط هنا</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="serive-0-modal" tabindex="-1" 
                                    aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable opacity-animate3">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">الرفع المساحي</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            ...
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded shadow-sm p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="service[]" value="1" id="service-1">
                                        <label class="form-check-label" for="service-1">
                                            التصميم المعماري
                                        </label>
                                    </div>
                                    <a data-bs-toggle="modal" data-bs-target="#serive-1-modal" href="http://" data-id="1">للتفاصيل أضغط هنا</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="serive-1-modal" tabindex="-1" 
                                    aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable opacity-animate3">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">التصميم المعماري</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            ...
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded shadow-sm p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="service[]" value="2" id="service-2">
                                        <label class="form-check-label" for="service-2">
                                            تقرير التربة
                                        </label>
                                    </div>
                                    <a href="http://" data-id="2">للتفاصيل أضغط هنا</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded shadow-sm p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input name="service[]" class="form-check-input" type="checkbox" value="3" id="service-3">
                                        <label class="form-check-label" for="service-3">
                                            المخططات التنفيذية
                                        </label>
                                    </div>
                                    <a href="http://" data-id="3">للتفاصيل أضغط هنا</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded shadow-sm p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input name="service[]" class="form-check-input" type="checkbox" value="4" id="service-4">
                                        <label class="form-check-label" for="service-4">
                                            تصميم مخططات التكييف
                                        </label>
                                    </div>
                                    <a href="http://" data-id="4">للتفاصيل أضغط هنا</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded shadow-sm p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input name="service[]" class="form-check-input" type="checkbox" value="5" id="service-5">
                                        <label class="form-check-label" for="service-5">
                                            مخططات الامن والسلامة
                                        </label>
                                    </div>
                                    <a href="http://" data-id="5">للتفاصيل أضغط هنا</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded shadow-sm p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input name="service[]" class="form-check-input" type="checkbox" value="6" id="service-6">
                                        <label class="form-check-label" for="service-6">
                                            رفع رخصة البناء
                                        </label>
                                    </div>
                                    <a href="http://" data-id="6">للتفاصيل أضغط هنا</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded shadow-sm p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input name="service[]" class="form-check-input" type="checkbox" value="7" id="service-7">
                                        <label class="form-check-label" for="service-7">
                                            تصميم الواجهات الخارجية
                                        </label>
                                    </div>
                                    <a href="http://" data-id="7">للتفاصيل أضغط هنا</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded shadow-sm p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input name="service[]" class="form-check-input" type="checkbox" value="8" id="service-8">
                                        <label class="form-check-label" for="service-8">
                                            التصميم الداخلي
                                        </label>
                                    </div>
                                    <a href="http://" data-id="8">للتفاصيل أضغط هنا</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded shadow-sm p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input name="service[]" class="form-check-input" type="checkbox" value="10" id="service-10">
                                        <label class="form-check-label" for="service-10">
                                            جداول الكميات 
                                        </label>
                                    </div>
                                    <a href="http://" data-id="10">للتفاصيل أضغط هنا</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded shadow-sm p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input  name="service[]" class="form-check-input" type="checkbox" value="11" id="service-11">
                                        <label class="form-check-label" for="service-11">
                                            الاشراف الهندسي اعمال العظم
                                        </label>
                                    </div>
                                    <a href="http://" data-id="11">للتفاصيل أضغط هنا</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded shadow-sm p-3 m-2 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input name="service[]" class="form-check-input" type="checkbox" value="12" id="service-12">
                                        <label class="form-check-label" for="service-12">
                                            الاشراف الهندسي اعمال التشطيبات
                                        </label>
                                    </div>
                                    <a href="http://" data-id="12">للتفاصيل أضغط هنا</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-4">طلب سعر</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection