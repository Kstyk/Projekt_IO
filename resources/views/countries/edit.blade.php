<!DOCTYPE html>
<html lang="en">
<head>
    @include('shared.header')
    <link rel="stylesheet" href="{{asset('css/cards_with_trips.css')}}">
    <style>
        body {
            color:white;
        }
    </style>
    <title>Edytuj kraj</title>
</head>
<body>
    @include('shared.nav')

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-12 col-xl-12">
            <div class="card bg-transparent text-white border-0">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                  <h2 class="fw-bold mb-2 text-uppercase">Edytuj kraj</h2>
                  @include('shared.error')

                  <form method="POST" action="{{ route('countries.update', $c->id) }}">
                    @csrf
                    @method('PUT')
                    <p class="text-white-50 mb-5">Wprowadź poprawne dane</p>
                    <div class="form-outline form-white mb-4">
                        <input id="name" type="text" name="name" value="{{ $c->name }}" class="form-control-lg w-100
                        @error('name') is-invalid @else is-valid
                        @enderror" />
                        <label class="form-label" for="name">Nazwa</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input name="iso3166" type="text" id="iso" value="{{ $c->iso3166 }}" class="form-control-lg w-100
                        @error('iso3166') is-invalid @else is-valid
                        @enderror" />
                        <label class="form-label" for="iso3166">Kod ISO 3166</label>
                    </div>
                    <div class="form-outline form-white mb-4">
                        <input name="currency" type="text" id="currency" value="{{ $c->currency }}" class="form-control-lg w-100
                        @error('currency') is-invalid @else is-valid
                        @enderror" />
                        <label class="form-label" for="currency">Waluta</label>
                    </div>
                    <div class="form-outline form-white mb-4">
                        <input name="total_surface" type="number" id="total_surface" value="{{ $c->total_surface }}" class="form-control-lg w-100
                        @error('total_surface') is-invalid @else is-valid
                        @enderror" />
                        <label class="form-label" for="total_surface">Powierzchnia całkowita</label>
                    </div>
                    <div class="form-outline form-white mb-4">
                        <input name="language" type="text" id="language" value="{{ $c->language }}" class="form-control-lg w-100
                        @error('language') is-invalid @else is-valid
                        @enderror" />
                        <label class="form-label" for="language">Język urzędowy</label>
                    </div>

                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Edytuj</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @include('shared.footer')
    @include('shared.js')
</body>
</html>

