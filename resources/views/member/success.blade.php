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
        <p class="text-right">{{$code ?? "1234567"}}</p>
      </div>
    </div>

    <div class="row font-weight-bold">
      <div class="col-6">
        <p class="text-left">Total</p>
      </div>
      <div class="col-6">
        <p class="text-right">{{$total ?? 1234556}}</p>
      </div>
    </div>

    <div>
      <p>
        {{$productName ?? "Kopi Luwak"}} that cost 
        {{$total ?? 1234556}} will be shipped to:
      </p>
      <p>{{$shipping ?? "Rumah Saya"}}</p>
      <p>Only after you pay</p>
    </div>

    <div style=" position: absolute; bottom: 0; left: 5%; margin-bottom: 15px; width: 90%">
      <a class="btn btn-primary btn-md btn-block" href="{{url("payment")}}" role="button">Pay Now</a>
    </div>

  </div>
@endsection