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

  <form action="" method="POST">
    @csrf
    @include("components.input_tag", [
      "type" => "text", 
      "name" => "code",
      "id" => "code",
      "placeholder" => "Order no",
      "status" => true
    ])
    @include("components.button_tag", [
      "name" => "Pay now",
      ])

  </form>
@endsection