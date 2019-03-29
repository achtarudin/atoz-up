@extends('layout.index')
@section('content')
  <div class="container">
    <div class="row justify-content-center my-5">
      <div class="col-md-4 col-sm-8">
        <div class="card">
          <div class="card-body">
            <div class="py-2">
              <h5>Login</h5>
            </div>
            {{-- Form --}}
              <form action="" method="post">

                {{-- Field Email --}}
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email">
                  </div>    
                {{-- End Field Email --}}

                {{-- Field Password --}}
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Your password">
                </div>
                {{-- End Field Password --}}

                <button type="submit" class="btn btn-primary btn-md btn-block">Login</button>

              </form>
            {{-- End Form --}}
          </div>
        </div>
        {{-- Login Url --}}
          <div class="my-5 text-center">
            <a class="btn btn-light" href="/register" role="button">
              <h5 class="text-primary">Register</h5>
            </a>
          </div>
        {{-- End Login Url --}}
      </div>
    </div>
  </div>
@endsection
@push('script-js')
  <script></script>
@endpush