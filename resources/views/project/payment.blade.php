@extends('layouts.app')
@section('title',"فن السكن | الدفع")
@section('content')

<script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$request->pay_id}}"></script>

<form action="{{route('projects.show',[$request->project_id,"bag"=>$request->id])}}" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>


@endsection
