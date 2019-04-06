@extends("components.header.layout")
@section("pages")
  <div class="pb-3">
    <h4>Prepaid Balance</h4>
  </div>

  <form action="{{url("/prepaid-balance")}}" method="post">
    @csrf

      @include('components.alert_tag', [
        "message" => $errors->first('phone_number')
      ])
      
      @include("components.input_tag", [
        "type" => "text", 
        "name" => "phone_number",
        "id" => "phone-number",
        "placeholder" => "Phone Number",
      ])
      
      @include("components.select_tag", [
        "name" => "topup_value",
        "values" => $topupValue
      ])

      @include("components.button_tag")

  </form>
@endsection