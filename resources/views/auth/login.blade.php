@extends("layouts.default")
@section("content")
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="form-container container">
        <h2 class="mb-4">Login</h2>
        @if(session()->has("success"))
            <div class="alert alert-success">
                {{session()->get("success")}}
            </div>
        @endif
        @if(session("error"))
            <div class="alert alert-danger">
                {{session("error")}}
            </div>
        @endif
    <form method="post" action="{{route("login.post")}}">
        @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email </label>
        <input type="email" class="form-control" id="email" placeholder="Email..." name="email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" placeholder="Senha..." name="password">
      </div>
      <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">Remember me</label>
      </div>
      <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
  </div>
@endsection

@section("style")
  <style>
    body {
      background-color: #1e1e1e;
      color: #fff;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-container {
      background-color: #2c2c2c;
      padding: 2rem;
      border-radius: 0.5rem;
      width: 30vw;

    }

    .form-control {
      background-color: #1e1e1e;
      border: 1px solid #444;
      color: #fff;
    }

    .form-check-label {
      color: #ccc;
    }

    .btn-primary {
      background-color: #0d6efd;
      border-color: #0d6efd;
    }
  </style>
@endsection