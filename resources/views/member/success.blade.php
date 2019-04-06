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
        <p class="text-right">{{$order['code']}}</p>
      </div>
    </div>

    <div class="row font-weight-bold">
      <div class="col-6">
        <p class="text-left">Total</p>
      </div>
      <div class="col-6">
        <p class="text-right">{{$order['total']}}</p>
      </div>
    </div>

    <div>
      <p>
        {{$order['message']}}
      </p>
      <p>Only after you pay</p>
    </div>

    <div style=" position: absolute; bottom: 0; left: 5%; margin-bottom: 15px; width: 90%">
      <a class="btn btn-primary btn-md btn-block" 
        href="{{url("payment")}}" role="button">Pay Now</a>
    </div>
 {{-- ["type" => base64_encode($order["type"]), "code" => $order["code"] ] --}}

  </div>
@endsection