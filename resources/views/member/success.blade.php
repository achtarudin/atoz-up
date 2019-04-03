@extends('components.header.layout')
@section('nav')
  @include('components.header.nav', ['name' => 'Moncos', 'code' => '1234567'])
@endsection
@section('pages')
  <div class="px-3 pb-3">
    <h4>Success</h4>
  </div>

  <div class="px-3">
    <div class="row font-weight-bold">
      <div class="col-6">
        <p class="text-left">Order no</p>
      </div>
      <div class="col-6">
        <p class="text-right">{{Session::get('orderNo')}}</p>
      </div>
    </div>

    <div class="row font-weight-bold">
      <div class="col-6">
        <p class="text-left">Total</p>
      </div>
      <div class="col-6">
        <p class="text-right">{{Session::get('total')}}</p>
      </div>
    </div>

    <div>
      <p>
        {{Session::get('message')}}
      </p>
      <p>Only after you pay</p>
    </div>

    <div style=" position: absolute; bottom: 0; left: 5%; margin-bottom: 15px; width: 90%">
      <a class="btn btn-primary btn-md btn-block" href="{{url("payment")}}" role="button">Pay Now</a>
    </div>

  </div>
@endsection