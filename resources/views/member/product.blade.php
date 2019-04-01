@extends("components.header.layout")
@section("nav")
  @include("components.header.nav", ["name" => "Moncos", "code" => "1234567"])
@endsection
@section("pages")
  <div class="pb-3">
      <h4>Product Page</h4>
  </div>


  <form action="{{url("/product")}}" method="POST">
    @csrf

    @include('components.alert_tag', [
        "message" => $errors->first('product')
      ])

    @include("components.textarea_tag", [
        "name" => "product", 
        "placeholder" => "Product"
      ])

    @include('components.alert_tag', [
        "message" => $errors->first('shipping')
      ])

    @include("components.textarea_tag", [
      "name" => "shipping", 
      "placeholder" => "Shipping Address"
    ])

    @include('components.alert_tag', [
      "message" => $errors->first('price')
    ])

    @include("components.input_tag", [
      "name" => "price", 
      "placeholder" => "Price",
      "id" => "price"
    ])

    @include("components.button_tag")
  </form>

@endsection