<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
  @include('sweetalert::alert')

    <div id="app">
        {{-- start navbar --}}
        <nav class="navbar navbar-expand-lg navbar-fixed">
            <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="{{asset('attachments/images/logo.png')}}" alt="" srcset="" width="80">
                    </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                  </li>
                </ul>
                <div class="contact-us me-auto">
                    <button class="btn btn-outline-dark px-3">تواصل معنا</button>
                </div>
              </div>
            </div>
          </nav>
        {{-- end navbar --}}
        {{-- <div class="breadumb my-5">
          <div class="container">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"></li>
                <li class="breadcrumb-item "><a class="text-primary" href="/">الرئيسية</a></li>
                @foreach (Request::segments() as $item)
                  <li class="breadcrumb-item"><a class="text-primary @if ($loop->last)
                      active
                  @endif" href="{{$item}}">{{ ucwords(str_replace('-',' ',$item))}}</a> <li>
                @endforeach
              </ol>
            </nav>
          </div>
        </div> --}}
        <main class="pt-5">
            @yield('content')
        </main>
    </div>
    {{-- js --}}
    <!-- footer -->
    <footer class="mt-5">
        <p class="text-center">
            جميع الحقوق محفوظة <a href="{{URL::to('/')}}">فن السكن </a> &copy; {{date('Y')}} 
        </p>
    </footer>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</body>
</html>
