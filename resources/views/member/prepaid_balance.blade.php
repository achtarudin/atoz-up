@extends("components.header.layout")
@section("nav")
  @include("components.header.nav", [
    "name" => "Moncos", 
    "code" => "1234567"])
@endsection
@section("pages")
  <div class="pb-3">
    <h4>Prepaid Balance</h4>
  </div>

  <form action="" method="POST">
    @csrf

      @include("components.input_tag", [
        "type" => "text", 
        "name" => "mobile_number",
        "id" => "mobile-number",
        "placeholder" => "Mobile Number",
      ])

      @include("components.select_tag", [
        "name" => "value",
        "values" => ["1000", "2000", "3000"]
      ])

      @include("components.button_tag")

  </form>
@endsection