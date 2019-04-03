@extends('components.header.layout')
@section('nav')
  @include('components.header.nav', ['name' => 'Moncos', 'code' => '1234567'])
@endsection
@section('pages')
  <div class="pb-3">
    <h4>
      Pay your order
    </h4>
  </div>

<form action="{{url('/payment')}}" method="POST">
    @csrf
    @include("components.input_tag", [
      "type" => "text", 
      "name" => "orderNo",
      "id" => "code",
      "placeholder" => "Order no",
      "value" => $orderNo
    ])
    @include("components.button_tag", [
      "name" => "Pay now",
      ])

  </form>
@endsection