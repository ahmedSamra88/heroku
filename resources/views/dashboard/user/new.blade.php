@extends('layouts.admin')
@section('title',"فن السكن | لوحة التحكم - اعدادات المستخدمين")
@section('content')
<div class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="mt-2  p-3">
                    <h2 class="my-5">اضافة مستخدم</h2>

                    <div class="card-body m-auto" style="max-width: 32rem;">
                        <form method="POST" action="{{ route('user-manage.store') }}">
                            @csrf
                            <div class="form-group row mb-2">
                                <label for="name" class="col-form-label ">الاسم رباعي</label>
                                <div class="">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                                    <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required>
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <select class="form-select" name="role" aria-label="Default select example">
                                <option value="eng">مهندس</option>
                                <option value="admin">مسئول</option>
                                <option value="accountant">محاسب</option>
                              </select>
                            <div class="form-group row mb-2">
                                <label for="password" class="col-form-label ">كلمة المرور</label>
                                <div class="">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="password-confirm" class="col-form-label ">تأكيد كلمة المرور</label>
                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="text-center mb-2">
                                    <button type="submit" class="btn btn-primary px-5">تسجيل</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection