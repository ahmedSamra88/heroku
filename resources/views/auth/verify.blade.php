@extends('layouts.app')
@section('content')
<div class="register">
    <div class="sidenav">
        <div class="login-main-text">
        <h2>تأكيد رقم الجوال</h2>
        <p>لديلك حساب بالفعل ؟ <a class="btn btn-link text-light" href="{{route('login')}}"> تسجيل الدخول</a></p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
        <div class="mt-5 pe-5">
            <div class="card-body  me-5" style="max-width: 32rem;">
                @if (session('error'))
                    <div class="alert alert-danger mb-2" role="alert">
                        {{session('error')}}
                    </div>
                    @endif
                    من فضلك قم بادخال الرمز التعريفي المرسل على جوالك للتأكيد : {{session('phone_number')}}
                    <form action="{{route('verify')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="">
                                <input type="hidden" name="phone_number" value="{{session('phone_number')}}">
                                <input id="verification_code" type="tel"
                                    class="form-control @error('verification_code') is-invalid @enderror"
                                    name="verification_code" value="{{ old('verification_code') }}" required>
                                @error('verification_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary">
                                    تأكيد رقم الجوال
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
