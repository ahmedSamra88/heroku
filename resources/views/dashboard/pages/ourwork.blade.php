@extends('layouts.admin')
@section('title',"فن السكن | لوحة التحكم - أعمالنا")
@section('content')
<div class="container home">
    {{-- home page {{ route('admin.postHome') }}--}}
    <form style="max-width: 600px; margin:auto;" class="text-end my-5" action="{{ route('ourwork.store') }}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">عنوان رئيسي</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for=""> وصف</label>
                    <textarea name="description" class="form-control" id="" cols="" rows="10">{{old('description')}}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group text-center">
                    <label for="img_url" class="text-right"> 
                        <i class="la la-mouse-pointer"></i>
                        <small class="d-block">صورة للعمل</small>
                    </label>
                    <input type="file" id="img_url" name="img_url" id="">
                </div>
            </div>
            <div class="d-flex col-md-12 justify-content-end">
                <button type="submit" class="btn btn-primary px-5">حفظ</button>
            </div>
        </div>
    </form>
    <div class="my-4">
        <div class="request ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <h2>كل الاعمال </h2>
                    </div>
                </div>
                @if (count($ourworks))
                <div class="shadow my-2">
                    <table class="table table-bordered text-center">
                        <thead>
                          <tr>
                            <th scope="col">كود</th>
                            <th scope="col">عنوان المشروع</th>
                            <th scope="col"> وصف المشروع</th>
                            <th scope="col">-</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($ourworks->sortByDesc('id') as $key=>$work)
                            <tr>
                              <th scope="row">{{$work->id}}</th>
                              <td>{{$work->title}}</td>
                              <td>{{$work->description}}</td>

                              <td>
                               <a class="btn btn-link m-auto" href="{{route('projects.show',$work->id)}}">تحرير</a></td>                            
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div>
                </div>
                @else
                    <div class="col-12 my-5">
                      <p class="text-muted text-center">ليس لديك مشاريع حالية.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
{{-- home page forms --}}
@endsection