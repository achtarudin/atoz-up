@extends('layout.index')
@section('content')
  <div class="container">
    <div class="row justify-content-center my-5">
      <div class="col-md-4 col-sm-8">
        <div class="card">
          <div class="card-body">
            <div class="py-2">
              <h5>Register New User</h5>
            </div>
            {{-- Form --}}
              <form action="/register" method="post">
                @csrf
                {{-- Field Name --}}
                  <div class="form-group">
                    <label for="name">Name</label>
                    <div class="text-danger">
                      {{$errors->first('first_name')}}
                    </div>
                    <input type="text" class="form-control" 
                      id="name" placeholder="Enter Name" name="first_name">
                  </div>
                {{-- End Field Name --}}

                {{-- Field Email --}}
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <div class="text-danger">
                      {{$errors->first('email')}}
                    </div>
                    <input type="email" class="form-control" 
                      id="email" aria-describedby="email" placeholder="Enter email" name="email" required>
                    <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>    
                {{-- End Field Email --}}

                {{-- Field Password --}}
                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="text-danger">
                    {{$errors->first('password')}}
                  </div>
                  <input type="password" class="form-control" 
                    id="password" placeholder="Your password" name="password">
                </div>
                {{-- End Field Password --}}

                <button type="submit" class="btn btn-primary btn-md btn-block">Register</button>

              </form>
            {{-- End Form --}}
          </div>
        </div>
        {{-- Login Url --}}
          <div class="my-5 text-center">
            <a class="btn btn-light" href="/login" role="button">
              <h5 class="text-primary">Login</h5>
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