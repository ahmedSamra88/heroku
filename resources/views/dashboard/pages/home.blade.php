@extends('layouts.admin')
@section('title',"فن السكن | لوحة التحكم - الرئيسية")
@section('content')
<div class="container home">
    @php
        $data=json_decode($component['data']);
    @endphp
    {{-- home page {{ route('admin.postHome') }}--}}
    <form style="max-width: 600px; margin:auto;" class="text-end my-5" action="{{ route('editmain') }}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">عنوان رئيسي</label>
                    <input type="hidden" name="head" value="head">
                    <input type="text" name="title" value="{{old('title',$data->title ?? '')}}" class="form-control" id="">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for=""> وصف</label>
                    <textarea name="description" class="form-control" id="" cols="" rows="10">{{old('description',$data->description ?? '')}}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group text-center">
                    <label for="section_bg" class="text-center"> 
                        {{-- <i class="fas fa-image"></i> --}}
                        @if (!empty($data->section_bg))
                            <img class="img-fluid" src="{{asset('attachments/dashboard/'.$data->section_bg ?? '')}}" alt="" srcset="">
                        @else
                            <i class="la la-image" style="font-size:6rem;"></i>
                        @endif
                        <small class="d-block">الخلفيه</small>
                    </label>
                    <input type="file" id="section_bg" name="section_bg" class="opacity-0" id="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group text-center">
                    <label for="image_one" class="text-center"> 
                        {{-- <i class="fas fa-image"></i> --}}
                        @if (!empty($data->image_one))
                            <img class="img-fluid" src="{{asset('attachments/dashboard/'.$data->image_one)}}" alt="" srcset="">
                        @else
                            <i class="la la-image" style="font-size:6rem;"></i>
                        @endif
                        <small class="d-block">صورة</small>
                    </label>
                    <input type="file" id="image_one" name="image_one" class="opacity-0" id="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group text-center">
                    <label for="image_two" class="text-center"> 
                        {{-- <i class="fas fa-image"></i> --}}
                        @if (!empty($data->image_two))
                            <img class="img-fluid" src="{{asset('attachments/dashboard/'.$data->image_two)}}" alt="" srcset="">
                        @else
                            <i class="la la-image" style="font-size:6rem;"></i>
                        @endif
                        <small class="d-block">صورة</small>
                    </label>
                    <input type="file" id="image_two" name="image_two" class="opacity-0" id="">
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">مشاريع حاليه</label>
                            <input type="text" name="current" value="{{old('current',$data->current ?? '')}}" class="form-control" id="">
                            @error('current')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">مشاريع مكتمله</label>
                            <input type="text" name="complete" value="{{old('complete',$data->complete ?? '')}}" class="form-control" id="">
                            @error('complete')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">مشاريع جديده</label>
                            <input type="text" name="new" value="{{old('new',$data->new ?? '')}}" class="form-control" id="">
                            @error('new')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">مشاريع اخرى</label>
                            <input type="text" name="other" value="{{old('other',$data->other ?? '')}}" class="form-control" id="">
                            @error('other')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex col-md-12 justify-content-end">
                <button type="submit" class="btn btn-primary px-5">حفظ</button>
            </div>
        </div>
    </form>
</div>
{{-- home page forms --}}
@endsection