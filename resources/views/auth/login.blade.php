<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include("shared.header")
    <link rel="stylesheet" href="{{asset('css/cards_with_trips.css')}}">
    <link rel="stylesheet" href="css/login.css">
    <title>Zaloguj się</title>
</head>
<body class="text-white">
    @include("shared.nav")

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-12 col-xl-12">
            <div class="card bg-transparent text-white border-0">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                  <h2 class="fw-bold mb-2 text-uppercase">Zaloguj się</h2>
                  @include('shared.error')

                  <form method="POST" action="{{ route('login.authenticate') }}">
                    @csrf
                    <p class="text-white-50 mb-5">Podaj twój email i hasło</p>

                    <div class="form-outline form-white mb-4">
                        <input id="emai" type="email" name="email" value="{{ old('email') }}" class="form-control-lg w-100
                        @error('email') is-invalid @else is-valid
                        @enderror" />
                        <label class="form-label" for="email">Email</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input name="password" type="password" id="password" class="form-control-lg w-100
                        @error('password') is-invalid @else is-valid
                        @enderror" />
                        <label class="form-label" for="password">Hasło</label>
                    </div>

                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                  </form>
                </div>
                <div>
                  <p class="mb-0">Nie masz konta? <a href="{{ route('register') }}" class="text-white-50 fw-bold">Zarejestruj się!</a>
                  </p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      @include('shared.footer')
</body>
</html>
