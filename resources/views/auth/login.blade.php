@extends('layouts.app')

@section('content')
<div class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="mt-2 shadow-sm p-3">
                    <h2 class="text-center my-5">تسجيل الدخول</h2>

                    <div class="card-body" style="max-width: 32rem;">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
        
                            <div class="row mb-3">
                                <label for="phone_number" class="">رقم الجوال</label>
        
                                <div class="">
                                    <input id="phone_number" type="phone" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone" autofocus>
        
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="password" class="col-form-label">كلمة المرور</label>
        
                                <div class="">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="text-center col-12 mb-4">
                                    <button type="submit" class="btn btn-primary">
                                        دخول
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    {{-- register --}}
                                    <p class="p-0">ليس لديك حساب ؟ <a class="text-muted" href="{{url('register')}}">تسجيل . </a></p>
                                </div>
                                <div class="col-md-6">
                                    {{-- forget password --}}
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link  text-muted p-0" href="{{ route('password.request') }}">
                                            نسيت كلمة المرور ؟
                                        </a>
                                    @endif
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
