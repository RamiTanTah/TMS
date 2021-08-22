@extends('admin.home')

@section('title', '| edit')

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      
      @include('includes.successAlert')
      @include('includes.errorAlert')



      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">User Informations</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">



          <!-- form start -->
          <form action="{{ route('user.update',[$user->id]) }}" method="POST" class="was-validated">
            @method('PUT')
            @csrf

            <!-- the first row-->
            <div class="row ">

              <div class="col-6">
                <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">Account Info</h4>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">

                        {{-- ### user_id ### --}}
                        <div class="form-group">
                          <label for="user_id">User id:</label>
                          <input class="form-control" id="user_id" name="user_id" value="{{ $user->id }}" required
                            @error('user_id') is-invalid @enderror disabled>

                          {{-- ### show message if we have any error in validation ### --}}
                          @error('user_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col-sm-6 -->

                      <div class="col-sm-6">
                        {{-- ### role ### --}}
                        <div class="form-group">
                          <label for="role_id">User role:</label>
                          <select class="form-control"   disabled>
                            <option selected value="{{ $user->role_id }}">{{ $user->role->name }}</option>
                          </select>
                          <input hidden id="role_id" name="role_id"  value="{{ $user->role_id }}">

                          {{-- ### show message if we have any error in validation ### --}}
                          @error('role_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <!-- /.form-group -->

                      </div>
                      <!-- /.col-sm-6 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-sm-6">
                        {{-- ### Account status ### --}}
                        <div class="form-group">
                          <label for="role_id">Account status:</label>
                          <select class="form-control"  
                            @error('account_status_id') is-invalid @enderror id="account_status_id" name="account_status_id" >
                            
                            <option selected value="{{ $user->account_status_id }}">{{ $user->account_status->name }}
                            </option>
                            
                            @if (isset($account_statuses) && $account_statuses->count() > 0)
                              @foreach ($account_statuses as $account_status)
                              @if ($account_status->id == $user->account_status_id)
                                @continue
                              @endif
                                <option value="{{ $account_status->id }}">{{ $account_status->name }}</option>
                              @endforeach
                            @endif
                          </select>


                          {{-- ### show message if we have any error in validation ### --}}
                          @error('account_status_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col-sm-6 -->

                      <div class="col-sm-6">
                        {{-- ### Account status ### --}}
                        <div class="form-group">
                          <label for="created_at">Created at:</label>
                          <input class="form-control" id="created_at" name="created_at"
                            value="{{ $user->created_at }}" autocomplete="created_at" 
                            @error('created_at') is-invalid @enderror disabled>

                          {{-- ### show message if we have any error in validation ### --}}
                          @error('created_at')
                            <small class="form-text text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col-sm-6 -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /col-6 -->



              {{-- ###  Personal User Info ### --}}
              <div class="col-6">
                <!-- general form elements -->
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Personal Info</h4>
                  </div>
                  <!-- /.card-header -->

                  <div class="card-body">
                    <!-- text input -->
                    <div class="row">
                      <div class="col-sm-6">
                        {{-- ### first name ### --}}
                        <div class="form-group">
                          <label for="firstName">First Name:</label>
                          <input type="text" class="form-control" placeholder="Enter First Name" id="firstName"
                            name="firstName" required autocomplete="firstName" value="{{ $user->firstName }}"
                            @error('firstName') is-invalid @enderror>
                          {{-- ### if the user not fill this field ### --}}
                          <div class="invalid-feedback">Please fill out this field.</div>

                          {{-- ### show message if we have any error in validation ### --}}
                          @error('firstname')
                            <small class="form-text text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col-sm-6 -->

                      <div class="col-sm-6">
                        {{-- ### last name ### --}}
                        <div class="form-group">
                          <label for="lastName">Last Name:</label>
                          <input type="text" class="form-control" placeholder="Enter Last Name" id="lastName"
                            name="lastName" required autocomplete="lastName" value="{{ $user->lastName }}"
                            @error('lastName') is-invalid @enderror>
                          {{-- ### if the user not fill this field ### --}}
                          <div class="invalid-feedback">Please fill out this field.</div>

                          {{-- ### show message if we have any error in validation ### --}}
                          @error('lastname')
                            <small class="form-text text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <!-- /.col-sm-6 -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                      <div class="col-sm-6">
                        {{-- ### DOB "Date-fo-Breath" ### --}}
                        <div class="form-group">
                          <label for="DOB">Date of breath:</label>
                          <input type="date" class="form-control" placeholder="Date of breath" id="DOB" name="DOB"
                            required autocomplete="DOB" value="{{ $user->DOB }}" @error('DOB') is-invalid @enderror>
                          {{-- ### if the user not fill this field ### --}}
                          <div class="invalid-feedback">Please fill out this field.</div>

                          {{-- ### show message if we have any error in validation ### --}}
                          @error('DOB')
                            <small class="form-text text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <!-- /.col-sm-6 -->

                      <div class="col-sm-6">
                        {{-- ### email ### --}}
                        <div class="form-group">
                          <label for="email">E-mail:</label>
                          <input type="email" class="form-control" placeholder="ex: user@yourdomain.com" id="email"
                            name="email" required autocomplete="email" value="{{ $user->email }}" @error('email')
                            is-invalid @enderror>
                          {{-- ### if the user not fill this field ### --}}
                          <div class="invalid-feedback">Please fill out this field.</div>

                          {{-- ### show message if we have any error in validation ### --}}
                          @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <!-- /.col-sm-6 -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col-6 -->
              {{-- ######################## --}}

            </div>
            <!-- /row -->

            {{-- the second row --}}
            {{-- ### Login info ### --}}

            <div class="row">
              <div class="col">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">User Login Info</h4>
                  </div>
                  <!-- /.card-header -->
                  <div class="row">
                    <div class="col-4">
                      <div class="card-body">


                        {{-- ### Username ### --}}
                        <div class="form-group">
                          <label for="name">Username:</label>
                          <input type="text" class="form-control" placeholder="username " id="name" name="name"
                            value="{{ $user->name }}" required autocomplete="name" autofocus @error('name') is-invalid
                            @enderror>
                          {{-- ### if the user not fill this field ### --}}
                          <div class="invalid-feedback">Please fill out this field.</div>

                          {{-- ### show message if we have any error in validation ### --}}
                          @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <!-- /form-group -->
                      </div>
                      <!-- /card-body -->
                    </div>
                    <!-- /col-4 -->


                    <div class="col-4">
                      <div class="card-body">

                        {{-- ### password ### --}}
                        <div class="form-group">
                          <label for="password">Password:</label>
                          <input type="password" class="form-control"
                            placeholder="Enter New password if you want change it" id="password" name="password" required
                            autocomplete="new-password" @error('password') is-invalid @enderror
                            value="{{ $user->password }}">
                          {{-- ### if the user not fill this field ### --}}
                          <div class="invalid-feedback">Please fill out this field.</div>

                          {{-- ### show message if we have any error in validation ### --}}
                          @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <!-- /card-body -->
                    </div>
                    <!-- /col-4 -->

                    <div class="col-4">
                      <div class="card-body">


                        {{-- ### confirm-password ### --}}
                        <div class="form-group">
                          <label for="password_confirm">Confirm Password:</label>
                          <input type="password" class="form-control" placeholder="confirm  new password "
                            id="password_confirm" name="password_confirmation" required autocomplete="new-password"
                            value="{{ $user->password }}">
                          {{-- ### if the user not fill this field ### --}}
                          <div class="invalid-feedback">Please fill out this field.</div>

                          {{-- ### show message if we have any error in validation ### --}}
                          @error('password_confirm')
                            <small class="form-text text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <!-- /form-group -->
                      </div>
                      <!-- /card-body -->
                    </div>
                    <!-- /col-4 -->

                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->


            <div class="card-footer">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                Edit User account
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
                      <p>Are you sure of the <b>Edit</b> information?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-warning">Yes</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.Modal -->

              <a href="{{ route('user.profile',[$user->id]) }}" class="btn btn-success">
                View profile
              </a>

              <a href="{{ route('admin.home') }}" class="btn btn-secondary">
                Back
              </a>

              {{-- <a href="{{ route('user.delete') }}" class="btn btn-danger float-right">
                Delete User
              </a> --}}

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModal-2">
                Delete !!
              </button>


              <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel2">confirmation message</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure of the <b>Delete</b> Account?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <a href="{{ route('user.destroy',[$user->id]) }}" class="btn btn-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.Modal -->


            </div>
            <!-- /.card-footer -->
          </form>
        </div>
        <!-- /.card-body-->
      </div>
      <!-- /.card -->
    </div>
    <!-- /container-fluid -->
  </div>
  <!-- /content-header -->




@endsection
