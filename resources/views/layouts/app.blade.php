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
        <nav class="navbar navbar-expand-lg navbar-fixed @if (!(Request::is('/')||Request::is('register')||Request::is('login')||Request::is('verify'))) 
        {{'navbar-dark bg-dark'}}
        @else {{'text-primary navbar-light'}} @endif"  @if (Request::is('/'))style="background-attachment:fixed;background-size:cover;background-image:url({{asset('attachments/dashboard/'.$header->section_bg)}})" @endif>
            <div class="container">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img src="{{asset('attachments/images/logo.png')}}" alt="" srcset="" width="80">
                    </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}">الرئيسية</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">من نحن</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">خدماتنا</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">مشاريعنا</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">اراء العملاء</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">تواصل معنا</a>
                  </li>
                </ul>
                <div class="contact-us me-auto navbar-nav"  style="z-index: 1000;">
                    @if (Auth::id())
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu text-end" aria-labelledby="navbarDropdown">
                          @if (Auth::user()->role === "admin")
                          <li><a class="dropdown-item" href="{{route('project-manage.index')}}">لوحة التحكم</a></li>
                          @else
                          @if (Auth::user()->role=="client")
                          <li><a class="dropdown-item" href="{{route('projectRequest')}}">طلب عرض سعر</a></li>
                          @endif
                          <li><a class="dropdown-item" href="{{route('projects.index')}}">مشاريعي</a></li>
                          @endif
                          <li>
                            
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                تسجيل الخروج
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                          </li>
                        </ul>
                      </li>
                    @else
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">تسجيل الدخول</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link btn btn-primary-outline px-3" href="{{url('register')}}">مستخدم جديد</a>
                      </li>
                    @endif
                    {{-- <button class="btn btn-outline-dark px-3">تواصل معنا</button> --}}
                </div>
              </div>
            </div>
          </nav>
        {{-- end navbar --}}
        {{-- @if (!(Request::is('/')||Request::is('register')||Request::is('login')||Request::is('verify')))
        <div class="breadumb my-5">
          <div class="container">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"></li>
                <li class="breadcrumb-item "><a class="text-primary" href="/">الرئيسية</a></li>
                @foreach (Request::segments() as $item)
                  <li class="breadcrumb-item"><a class="text-primary @if ($loop->last)
                      active
                  @endif" href="/{{$item}}">{{ ucwords(str_replace('-',' ',$item))}}</a> <li>
                @endforeach
              </ol>
            </nav>
          </div>
        </div>
        @endif --}}
        <main class="@if (!Request::is('/')) {{'pt-5'}} @endif">
        
            @yield('content')
        </main>
    </div>
    {{-- js --}}
    <!-- footer -->
    <footer class="mt-5">
      @auth
      <style>                 
        .rating-wrapper label {
          color: #E1E6F6;
          cursor: pointer;
          display: inline-flex;
          font-size:15px;
          padding: 1rem 0.6rem;
          transition: color 0.5s;
        }
        .rating-wrapper svg {
          -webkit-text-fill-color: transparent;
          -webkit-filter: drop-shadow 4px 1px 6px #c6ceed;
          filter: drop-shadow(5px 1px 3px #c6ceed);
        }
        .rating-wrapper input {
          height: 100%;
          width: 100%;
        }
        .rating-wrapper input {
          display: none;
        }
        .rating-wrapper label:hover,
        .rating-wrapper label:hover ~ label,
        .rating-wrapper input:checked ~ label {
          color: #FBC634;
        }
        .rating-wrapper label:hover,
        .rating-wrapper label:hover ~ label,
        .rating-wrapper input:checked ~ label {
          color: #FBC634;
        }
      </style>
      @php
      if (Auth::user()->rate) {
        $rate=Auth::user()->rate->rating;
      }else{
        $rate=0;
      }
      @endphp
      <div class="modal fade" id="ratmodal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content p-4">        
              <h4>اضف تقييمك !</h4>          
              <div class="container-wrapper">  
                <div class="container">
                  <div class="row justify-content-center">    
                    
                    <!-- star rating -->
                    <form class="rating-wrapper" method="POST" action="{{route('rate.store')}}">
                        @csrf
                      <!-- star 5 -->
                      <input type="radio" id="5-star_rating" name="star_rating" value="5" @if ($rate==5){{"checked"}}@endif >
                      <label for="5-star_rating" class="star_rating">
                        <i class="fas fa-star d-inline-block"></i>
                      </label>
                      
                      <!-- star 4 -->
                      <input type="radio" id="4-star_rating" name="star_rating" value="4" @if ($rate==4){{"checked"}}@endif >
                      <label for="4-star_rating" class="star_rating star">
                        <i class="fas fa-star d-inline-block"></i>
                      </label>
                      
                      <!-- star 3 -->
                      <input type="radio" id="3-star_rating" name="star_rating" value="3" @if ($rate==3){{"checked"}}@endif >
                      <label for="3-star_rating" class="star_rating star">
                        <i class="fas fa-star d-inline-block"></i>
                      </label>
                      
                      <!-- star 2 -->
                      <input type="radio" id="2-star_rating" name="star_rating" value="2" @if ($rate==2){{"checked"}}@endif >
                      <label for="2-star_rating" class="star_rating star">
                        <i class="fas fa-star d-inline-block"></i>
                      </label>
                      
                      <!-- star 1 -->
                      <input type="radio" id="1-star_rating" name="star_rating" value="1" @if ($rate==1){{"checked"}}@endif >
                      <label for="1-star_rating" class="star_rating star">
                        <i class="fas fa-star d-inline-block"></i>
                      </label>
                      
                      <div class="mb-3">
                        <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>

                      <button class="btn btn-primary">اضف تقيمك</button>
                    </form>
                    
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="text-center rounded mb-4 p-4 shadow mx-auto" style="width:15rem;" data-bs-toggle="modal" data-bs-target="#ratmodal">
          @php $rating = $rate; @endphp  
  
            @foreach(range(1,5) as $i)
                <span class="fa-stack" style="width:1em">
                    <i class="far fa-star fa-stack-1x"></i>
  
                    @if($rating >0)
                        @if($rating >0.5)
                            <i class="fas fa-star fa-stack-1x"></i>
                        @else
                            <i class="fas fa-star-half fa-stack-1x"></i>
                        @endif
                    @endif
                    @php $rating--; @endphp
                </span>
            @endforeach
      </div>  
      @endauth

        <p class="text-center">
            جميع الحقوق محفوظة <a href="{{URL::to('/')}}">فن السكن </a> &copy; {{date('Y')}} 
        </p>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
