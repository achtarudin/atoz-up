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
              <form action="/login" method="post">
                @csrf
                {{-- Field Email --}}
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <div class="text-danger">
                      {{$errors->first('email')}}
                    </div>
                    <input type="email" class="form-control" name="email"
                      id="email" placeholder="Enter email" value="{{ old('email')}}">
                  </div>    
                {{-- End Field Email --}}

                {{-- Field Password --}}
                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="text-danger">
                      {{$errors->first('password')}}
                    </div>
                  <input type="password" class="form-control" name="password"
                    id="password" placeholder="Your password">
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