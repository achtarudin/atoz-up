@extends('components.header.layout')
@section('nav')
  @include('components.header.nav', ['name' => 'Moncos', 'code' => '1234567'])
@endsection
@section('pages')
  <div class="pb-3">
    <h4>Order History</h4>
  </div>

  <form action="" method="POST">
    @csrf
    @include("components.input_tag", [
        "type" => "text", 
        "name" => "search_order",
        "id" => "search-order",
        "placeholder" => "Search by Order no",
      ])
  </form>
  <ul class="list-group list-group-flush">
    @forelse ($userHistory as $item)
    <li class="list-group-item">
      {{$item->topup_code ?? $item->shipping_code}} - 
      <span class="badge badge-primary badge-pill">
        @php
        if($item->topup_value){
          $taxs = $item->topup_value * 0.05 + $item->topup_value;
          $message = "Rp. {$item->topup_value} for {$item->phone_number}";
        }
        else {
          $taxs = $item->price + 10000;
          $message = "{$item->product_name} that costs {$item->price} 
            will be shipped to : \n {$item->shipping_address}";
        }
        @endphp
        Rp. {{$taxs}}
      </span>
      <span class="float-right badge badge-danger badge-pill">
        {{$item->histories->status}}
      </span> 
      <div>
        {{$message}}
      </div>
    </li>
    @empty
      <li class="list-group-item">
        Order Is Empty
      </li>
    @endforelse
  </ul>
@endsection