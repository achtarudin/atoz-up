@extends("layout.index")
@section("content")
  <div class="container">
    <div class="row justify-content-center my-5">
      <div class="col-md-5 col-sm-10">

        @yield("nav")

        <div class="card" style="height: 70vh; position: relative;">
          <div class="card-body">
            <div class="py-2">

              @yield("pages")
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push("script-js")
    <script></script>
@endpush