@extends('layouts.app')
@section('title',"فن السكن | الرئيسية")
@section('content')
    {{-- start header --}}
    @php
        $header=json_decode($head['data']);
        // var_dump($head);\
    @endphp
    <header class="header"  style="background-attachment:fixed;background-size:cover;background-image:url({{asset('attachments/dashboard/'.$header->section_bg)}})">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contents ps-5">

                        <h1> {{$header->title}}</h1>
                        <p>{{Str::words($header->description,$words = 70, $end='...');}}</p>
                        <a href="{{route('projectRequest')}}" class="btn btn-primary px-4">طلب سعر</a>
                        <a class="btn btn-link text-primary" href="{{route('head')}}">قراءة المزيد    <i class="fa-solid p-2 fa-angle-left"></i> </a>
                        <div class="my-3 statistics row text-center">
                            <div class="col-6 col-sm-3">
                                <p class="number fs-3 fw-bold">{{$header->current}}</p>
                                <p class="text-muted">مشاريع مكتملة</p>
                            </div>
                            <div class="col-6 col-sm-3">
                                <p class="number fs-3 fw-bold">{{$header->complete}}</p>
                                <p class="text-muted">مشاريع مكتملة</p>
                            </div>
                            <div class="col-6 col-sm-3">
                                <p class="number fs-3 fw-bold">{{$header->new}}</p>
                                <p class="text-muted">مشاريع مكتملة</p>
                            </div>
                            <div class="col-6 col-sm-3">
                                <p class="number fs-3 fw-bold">{{$header->other}}</p>
                                <p class="text-muted">مشاريع مكتملة</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="slider py-5">
                        <div class="img-container">
                            <img class="shadow-lg" src="{{asset('attachments/dashboard/'.$header->image_one)}}" style="max-width:45%; " height="200px" alt="" srcset="">
                            <img class="shadow-lg" src="{{asset('attachments/dashboard/'.$header->image_two)}}" style="max-width:45%; " height="200px" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- end header --}}
    {{-- start about us --}}
    <div class="about-us py-5">
        <div class="container">
            <h3 class="title mb-5 text-muted text-center">
                من نحن
            </h3>
            <div class="row">

                <div class="col-md-4">
                    <img src="{{asset('attachments/images/img1.jpg')}}" alt="" srcset="">
                </div>
                <div class="col-md-8 text-end">
                    <h2 class="h1 text-bold">فن السكن <br>للاستشارات الهندسية</h2>
                    <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ</p>
                    <button class="btn btn-link">قراءة المزيد..</button>
                </div>

            </div>
        </div>
    </div>
    {{-- end about us --}}
    {{-- start services --}}
    <div class="our-services text-center">
        <h3 class="text-muted fw-bold">من خدماتنا</h3>
        <p class="p-5">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ</p>
        <div class="services py-4 bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title fw-bold">1</h5>
                            <h6 class="card-subtitle mb-2 text-muted  fw-bold h4">الرفع المساحي</h6>
                            <p class="card-text">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title fw-bold">1</h5>
                            <h6 class="card-subtitle mb-2 text-muted  fw-bold h4">الرفع المساحي</h6>
                            <p class="card-text">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title fw-bold">1</h5>
                            <h6 class="card-subtitle mb-2 text-muted  fw-bold h4">الرفع المساحي</h6>
                            <p class="card-text">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title fw-bold">1</h5>
                            <h6 class="card-subtitle mb-2 text-muted  fw-bold h4">الرفع المساحي</h6>
                            <p class="card-text">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title fw-bold">1</h5>
                            <h6 class="card-subtitle mb-2 text-muted  fw-bold h4">الرفع المساحي</h6>
                            <p class="card-text">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title fw-bold">1</h5>
                            <h6 class="card-subtitle mb-2 text-muted  fw-bold h4">الرفع المساحي</h6>
                            <p class="card-text">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title fw-bold">1</h5>
                            <h6 class="card-subtitle mb-2 text-muted  fw-bold h4">الرفع المساحي</h6>
                            <p class="card-text">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end services --}}
    {{-- start our projects --}}
    <div class="our-projects text-center py-5">
        <div class="container">
            <h2 class="title">من مشاريعنا</h2>
            <p class="px-5 mb-4">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ</p>
            <div class="slide py-4">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4">
                              <div class="card shadow">
                                  <img class="card-img-top" src="{{asset('attachments/images/img1.jpg')}}" alt="Card image cap">
                                  <div class="">
                                    {{-- <h5 class="card-title">Card title</h5> --}}
                                    {{-- <a href="#" class="btn btn-link">مشروع فيلا</a> --}}
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>First slide label</h5>
                                        <p>Some representative placeholder content for the first slide.</p>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="card shadow">
                                  <img class="card-img-top" src="{{asset('attachments/images/img1.jpg')}}" alt="Card image cap">
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="card shadow">
                                  <img class="card-img-top" src="{{asset('attachments/images/img1.jpg')}}" alt="Card image cap">
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4">
                              <div class="card shadow">
                                  <img class="card-img-top" src="{{asset('attachments/images/img1.jpg')}}" alt="Card image cap">
                                  <div class="pb-0">
                                    {{-- <h5 class="card-title">Card title</h5> --}}
                                    {{-- <a href="#" class="btn btn-link">مشروع فيلا</a> --}}
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>First slide label</h5>
                                        <p>Some representative placeholder content for the first slide.</p>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="card shadow">
                                  <img class="card-img-top" src="{{asset('attachments/images/img1.jpg')}}" alt="Card image cap">
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="card shadow">
                                  <img class="card-img-top" src="{{asset('attachments/images/img1.jpg')}}" alt="Card image cap">
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4">
                              <div class="card shadow">
                                  <img class="card-img-top" src="{{asset('attachments/images/img1.jpg')}}" alt="Card image cap">
                                  <div class="">
                                    {{-- <h5 class="card-title">Card title</h5> --}}
                                    {{-- <a href="#" class="btn btn-link">مشروع فيلا</a> --}}
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>First slide label</h5>
                                        <p>Some representative placeholder content for the first slide.</p>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="card shadow">
                                  <img class="card-img-top" src="{{asset('attachments/images/img1.jpg')}}" alt="Card image cap">
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="card shadow">
                                  <img class="card-img-top" src="{{asset('attachments/images/img1.jpg')}}" alt="Card image cap">
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <button class="btn btn-secondary px-4">المزيد</button>
        </div>
    </div>
    {{-- end our projects --}}
    {{-- start testmonial --}}
    <div class="testmonial bg-light py-5">
        @include('include.testmonial')
    </div>
    {{-- end testmonial --}}
    {{-- start contact us --}}
    <div class="contact-form">

    </div>
    {{-- end contact us --}}
@endsection
