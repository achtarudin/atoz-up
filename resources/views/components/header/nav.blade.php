<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <div class="text-center">
      <span>{{$name ?? "Hello"}}</span><br>
      <span>{{$code ?? "12345678"}}</span>
    </div>
    <div>
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="{{url("prepaid-balance")}}">Prepaid Balance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url("product")}}">Product Page</a>
        </li>
      </ul>
    </div>
  </div>
</nav>