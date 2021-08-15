@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Register') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="password-confirm"
                  class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
                </div>
              </div>

              {{-- Enter firstName --}}
              <div class="form-group row">
                <label for="firstName" class="col-md-4 col-form-label text-md-right">firstName</label>
                <div class="col-md-6">
                  <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror"
                    name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName">

                  @error('firstName')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              {{-- Enter lastName --}}
              <div class="form-group row">
                <label for="lastName" class="col-md-4 col-form-label text-md-right">lastName</label>
                <div class="col-md-6">
                  <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror"
                    name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName">

                  @error('lastName')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>


              {{-- Enter DOB //Date-of-Brath --}}
              <div class="form-group row">
                <label for="DOB" class="col-md-4 col-form-label text-md-right">DOB</label>
                <div class="col-md-6">
                  <input id="DOB" type="date" class="form-control @error('DOB') is-invalid @enderror" name="DOB"
                    value="{{ old('DOB') }}" required autocomplete="DOB">

                  @error('DOB')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              {{-- ###############Testo################ --}}
              {{-- Enter Role-id //Role_ID --}}
              <div class="form-group row">
                <label for="RoleID" class="col-md-4 col-form-label text-md-right">RoleID</label>
                <div class="col-md-6">
                  <input id="role_id" type="number" class="form-control @error('role_id') is-invalid @enderror"
                    name="role_id" value="{{ old('role_id') }}" required autocomplete="role_id">

                  @error('role_id')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              {{-- ###############Testo################ --}}
              {{-- Enter Role-id //AccountStatus_ID --}}
              <div class="form-group row">
                <label for="AccountStatus_ID" class="col-md-4 col-form-label text-md-right">AccountStatus_ID</label>
                <div class="col-md-6">
                  <input id="accountStatus_id" type="number" class="form-control @error('accountStatus_id') is-invalid @enderror"
                    name="accountStatus_id" value="{{ old('accountStatus_id') }}" required autocomplete="accountStatus_id">

                  @error('accountStatus_id')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>



              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
