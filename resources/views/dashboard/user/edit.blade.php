@extends('layouts.admin')
@section('title',"فن السكن | لوحة التحكم - اعدادات المستخدمين")
@section('content')
<div class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="mt-2  p-3">
                    <h2 class="my-5">تعديل مستخدم</h2>
                    <div class="card-body m-auto" style="max-width: 32rem;">
                        <form action="{{ route('user-manage.update',$eng->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-2">
                                <label for="name" class="col-form-label ">الاسم رباعي</label>
                                <div class="">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{  $eng->name }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="phone_number" class="col-form-label ">رقم الجوال </label>
                                <div class="">
                                    <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $eng->phone_number }}" required>
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="text-center mb-2">
                                    <button type="submit" class="btn btn-primary px-5">تعديل</button>
                                </div>
                            </div>
                        </form>
                        <div class="text-center">
                            
                            <form action="{{ route('user-manage.destroy',$eng->id)}}"  method="POST" >
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-link text-danger m-auto" type="submit">حذف</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection