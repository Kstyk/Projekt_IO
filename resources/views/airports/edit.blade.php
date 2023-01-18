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
    <title>Edytuj lotnisko</title>
</head>
<body>
    @include('shared.nav')

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-12 col-xl-12">
            <div class="card bg-transparent text-white border-0">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                  <h2 class="fw-bold mb-2 text-uppercase">Edytuj lotnisko</h2>
                  @include('shared.error')

                  <form method="POST" action="{{ route('airports.update', $airport->id) }}">
                    @csrf
                    @method('PUT')
                    <p class="text-white-50 mb-5">Wprowadź poprawne dane</p>
                    <div class="form-outline form-white mb-4">
                        <input id="name" type="text" name="name" value="{{ $airport->name }}" class="form-control-lg w-100
                        @error('name') is-invalid @else is-valid
                        @enderror" />
                        <label class="form-label" for="name">Nazwa</label>
                    </div>
                    <div class="form-outline form-white mb-4">
                        <select class="form-control-lg w-100" id="country_id" name="country_id">
                            @foreach ($countries as $c)
                                <option value="{{$c->id}}" @if($c->name == $airport->country->name) selected @endif>
                                    {{ $c->name }}
                                </option>
                            @endforeach
                        </select>
                        <label class="form-label" for="country_id">Kraj</label>
                    </div>
                    <div class="form-outline form-white mb-4">
                        <input name="city" type="text" id="city" value="{{ $airport->city }}" class="form-control-lg w-100
                        @error('city') is-invalid @else is-valid
                        @enderror" />
                        <label class="form-label" for="city">Miasto</label>
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

