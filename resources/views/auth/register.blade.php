@extends('layouts.app')
@section('content')
<div class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="mt-2 shadow-sm p-3">
                    <h2 class="text-center my-5">تسجيل</h2>

                    <div class="card-body" style="max-width: 32rem;">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row mb-2">
                                <label for="name" class="col-form-label text-md-right">الاسم رباعي</label>
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
                                <label for="phone_number" class="col-form-label text-md-right">رقم الجوال </label>
                                <div class="">
                                    <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required>
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="password" class="col-form-label text-md-right">كلمة المرور</label>
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
                                <label for="password-confirm" class="col-form-label text-md-right">تأكيد كلمة المرور</label>
                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="text-center mb-2">
                                    <button type="submit" class="btn btn-primary px-5">تسجيل</button>
                                </div>
                                <p>لديلك حساب بالفعل ؟ <a class="btn btn-link text-dark" href="{{route('login')}}"> تسجيل الدخول</a></p>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
