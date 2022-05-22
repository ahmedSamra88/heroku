@extends('layouts.single')
@section('title',"فن السكن | الرئيسية")
@section('content')
{{-- start header --}}
@php
    $section=json_decode($head['data']);
    // var_dump($head);\
@endphp
<header class="header">
    <div class="container">
            <div class="col-md-12">
                <div class="contents py-5">

                    <h1> {{$section->title}}</h1>
                    <p>{{$section->description}}</p>
                    <div class="my-3 statistics row text-center">
                        <div class="col-6 col-sm-3">
                            <p class="number fs-3 fw-bold">{{$section->current}}</p>
                            <p class="text-muted">مشاريع مكتملة</p>
                        </div>
                        <div class="col-6 col-sm-3">
                            <p class="number fs-3 fw-bold">{{$section->complete}}</p>
                            <p class="text-muted">مشاريع مكتملة</p>
                        </div>
                        <div class="col-6 col-sm-3">
                            <p class="number fs-3 fw-bold">{{$section->new}}</p>
                            <p class="text-muted">مشاريع مكتملة</p>
                        </div>
                        <div class="col-6 col-sm-3">
                            <p class="number fs-3 fw-bold">{{$section->other}}</p>
                            <p class="text-muted">مشاريع مكتملة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection