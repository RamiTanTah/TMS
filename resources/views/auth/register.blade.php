@extends('admin.home')

@section('title', '| Create User')

@section('content')
  <div class="container-fluid">

    <div class="row ">
      <div class="col-2">
        {{-- space --}}
      </div>

      <div class="col-8">
        {{-- ### show message for success Rigsteration ### --}}
        @if (Session::has('success'))
          <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
          </div>
        @endif

        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Rigster New User</h4>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <div class="quickForm">
            <form action="{{ route('register') }}" method="POST" class="was-validated">
              @csrf
              <div class="card-body">

                {{-- ### first name ### --}}
                <div class="form-group">
                  <label for="firstName">First Name:</label>
                  <input type="text" class="form-control" placeholder="Enter First Name" id="firstName" name="firstName"
                    required autocomplete="firstName" value="{{ old('firstName') }}" @error('firstName') is-invalid
                    @enderror>
                  {{-- ### if the user not fill this field ### --}}
                  <div class="invalid-feedback">Please fill out this field.</div>

                  {{-- ### show message if we have any error in validation ### --}}
                  @error('firstname')
                    <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>

                {{-- ### last name ### --}}
                <div class="form-group">
                  <label for="lastName">Last Name:</label>
                  <input type="text" class="form-control" placeholder="Enter Last Name" id="lastName" name="lastName"
                    required autocomplete="lastName" value="{{ old('lastName') }}" @error('lastName') is-invalid
                    @enderror>
                  {{-- ### if the user not fill this field ### --}}
                  <div class="invalid-feedback">Please fill out this field.</div>

                  {{-- ### show message if we have any error in validation ### --}}
                  @error('lastname')
                    <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>

                {{-- ### DOB "Date-fo-Breath" ### --}}
                <div class="form-group">
                  <label for="DOB">Date of breath:</label>
                  <input type="date" class="form-control" placeholder="Date of breath" id="DOB" name="DOB" required
                    autocomplete="DOB" value="{{ old('DOB') }}" @error('DOB') is-invalid @enderror>
                  {{-- ### if the user not fill this field ### --}}
                  <div class="invalid-feedback">Please fill out this field.</div>

                  {{-- ### show message if we have any error in validation ### --}}
                  @error('DOB')
                    <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>

                {{-- ### email ### --}}
                <div class="form-group">
                  <label for="email">E-mail:</label>
                  <input type="email" class="form-control" placeholder="ex: user@yourdomain.com" id="email" name="email"
                    required autocomplete="email" value="{{ old('email') }}" @error('email') is-invalid @enderror>
                  {{-- ### if the user not fill this field ### --}}
                  <div class="invalid-feedback">Please fill out this field.</div>

                  {{-- ### show message if we have any error in validation ### --}}
                  @error('email')
                    <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>

                {{-- ### Username ### --}}
                <div class="form-group">
                  <label for="name">Username:</label>
                  <input type="text" class="form-control" placeholder="username " id="name" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus @error('name') is-invalid
                    @enderror>
                  {{-- ### if the user not fill this field ### --}}
                  <div class="invalid-feedback">Please fill out this field.</div>

                  {{-- ### show message if we have any error in validation ### --}}
                  @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>

                {{-- ### password ### --}}
                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" placeholder="password " id="password" name="password"
                    required autocomplete="new-password" @error('password') is-invalid @enderror>
                  {{-- ### if the user not fill this field ### --}}
                  <div class="invalid-feedback">Please fill out this field.</div>

                  {{-- ### show message if we have any error in validation ### --}}
                  @error('password')
                    <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>

                {{-- ### confirm-password ### --}}
                <div class="form-group">
                  <label for="password_confirm">Confirm Password:</label>
                  <input type="password" class="form-control" placeholder="confirm password " id="password_confirm"
                    name="password_confirmation" required autocomplete="new-password">
                  {{-- ### if the user not fill this field ### --}}
                  <div class="invalid-feedback">Please fill out this field.</div>

                  {{-- ### show message if we have any error in validation ### --}}
                  @error('password_confirm')
                    <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Create Account
                </button>


                <!-- Modal and confirmation message -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">confirmation message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Are you sure of the entered information</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes,sure</button>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>

        <div class="col-2">
          {{-- space --}}
        </div>
      </div>
      <!--/.col-8-->
    </div>
    <!--/.row-->
  </div>



@endsection
