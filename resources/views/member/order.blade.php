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

  @forelse ([] as $item)
    {{$item}}
  @empty
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Cras justo odio
        <span class="badge badge-primary badge-pill">14</span>
      </li>
      <li class="list-group-item">Dapibus ac facilisis in
        <span class="badge badge-primary badge-pill">14</span>
      </li>
      <li class="list-group-item">Morbi leo risus
        <span class="badge badge-primary badge-pill">14</span>
      </li>
      <li class="list-group-item">Porta ac consectetur ac
        <span class="badge badge-primary badge-pill">14</span>
      </li>
      <li class="list-group-item">Vestibulum at eros
        <span class="badge badge-primary badge-pill">14</span>
      </li>
    </ul>
  @endforelse
@endsection