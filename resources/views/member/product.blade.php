@extends("components.header.layout")
@section("nav")
  @include("components.header.nav", ["name" => "Moncos", "code" => "1234567"])
@endsection
@section("pages")
  <div class="pb-3">
      <h4>Product Page</h4>
  </div>


  <form action="" method="POST">
    @csrf

    @include("components.textarea_tag", 
      [
        "name" => "product", 
        "holder" => "Product"
      ])

    @include("components.textarea_tag", 
    [
      "name" => "shipping", 
      "holder" => "Shipping Address"
    ])

    @include("components.input_tag", 
    [
      "name" => "price", 
      "placeholder" => "Price",
      "id" => "price"
    ])

    @include("components.button_tag")
  </form>

@endsection