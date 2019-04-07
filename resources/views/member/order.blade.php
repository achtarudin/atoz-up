@extends('components.header.layout')
@section('nav')
  @include('components.header.nav', ['name' => 'Moncos', 'code' => '1234567'])
@endsection
@section('pages')
  <div class="pb-3">
    <h4>Order History</h4>
  </div>

  <form action="{{route('search-order', [\Sentinel::getUser()->id])}}" method="POST">
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
      {{$item->historiesable->code}} -
        <span class="badge badge-dark">
          @php
            if($item->historiesable_type == config('order.models.topup')){
              $taxs = $item->historiesable->value * 0.05 + $item->historiesable->value;
              $message = "Rp. {$item->historiesable->value} for {$item->historiesable->phone_number}";
            }
            else {
              $taxs = $item->historiesable->price + 10000;
              $message = "{$item->historiesable->product_name} 
              that costs {$item->historiesable->price} 
              will be shipped to : \n {$item->historiesable->shipping_address}";
            }
          @endphp
          {{$taxs}}
        </span>
        @if ($item->status === config('order.status.success'))
          @if ($item->historiesable_type === config('order.models.topup'))
            <span class="float-right badge badge-success py-2">
              Success
            </span> 
          @else
          <span class="float-right badge badge-info py-2">
            Shipping Code <br> <br> {{$item->historiesable->code}}
          </span> 
          @endif
        @elseif ($item->status === config('order.status.failed'))
            <span class="float-right badge badge-danger py-2">
              Failed
            </span>
        @else
          <span class="float-right py-2">
            <a href="{{route("pay-order", ["id" => $item->id])}}"
              class="badge badge-primary py-2">Pay</a>
          </span>
        @endif
        <div>{{$message}}</div>
    </li>
    @empty
      <li class="list-group-item">
        Order Is Empty
      </li>
    @endforelse
  </ul>
  <div class="mt-4 d-flex justify-content-center">
    {{$userHistory->links()}}
  </div>
@endsection