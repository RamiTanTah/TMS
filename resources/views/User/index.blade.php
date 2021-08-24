@extends('admin.home')

@section('title', 'users show')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

      @include('includes.successAlert')
      @include('includes.errorAlert')

      {{-- check if the users or user is exist or not --}}
      @if (isset($users) && $users->count() > 0)
        <div class="row">
          <div class="col">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">All Users</h3>
                <div class="card-tools">

                  <form action="{{ route('user.result', 'search') }}" method="GET">
                    <div class="input-group input-group-sm">
                      <input type="search" name="q" class="form-control float-right" placeholder="Search">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
              <!-- /.card-header -->

              <div class="card-body table-responsive p-0">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Role</th>
                      <th>Username</th>
                      <th>Status</th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Email</th>
                      <th>DOB</th>
                      <th>Created at</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $user->id }} </td>
                        {{-- print with red color if user without workspace--}}
                        @if($user->role_id == 4)
                        <td class="text-warning"><b>{{ $user->role->name }}</b></td>
                        @else
                        <td>{{ $user->role->name }} </td>
                        @endif
                        <td>{{ $user->name }} </td>
                        {{-- prrint with red color if user account not activa --}}
                        @if($user->account_status_id != 1)
                        <td class="text-danger"><b>{{ $user->account_status->name }}</b></td>
                        @else
                        <td>{{ $user->account_status->name }} </td>
                        @endif
                        <td>{{ $user->firstName }}</td>
                        <td>{{ $user->lastName }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->DOB }}</td>
                        <td>{{ $user->created_at }}</td>

                        <td>
                          <!-- Button trigger modal -->
                          <button type="submit" class="btn btn-success" data-toggle="modal"
                            data-target="#exampleModal-{{ $user->id }}">
                            Edit
                          </button>

                          <!-- Modal and confirmation message -->
                          <div class="modal fade" id="exampleModal-{{ $user->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">confirmation
                                    message</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Do you want Edit the user informations?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="{{ route('user.edit',[$user->id]) }}" class="btn btn-primary">
                                    Yes</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--/.modal-->

                          <!-- Button trigger modal -->
                          <button type="submit" class="btn btn-danger" data-toggle="modal"
                            data-target="#exampleModal2-{{ $user->id }}">
                            View profile
                          </button>

                          <!-- Modal and confirmation message -->
                          <div class="modal fade" id="exampleModal2-{{ $user->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">confirmation
                                    message</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Do you want <br>view<br> profile!?</p>
                                </div>
                                <div class="modal-footer">

                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="#" class="btn btn-danger">
                                    Yes</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--/.modal-->
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          {{-- col --}}
        </div>
        {{-- row --}}
      @else


        <!-- Main content -->
        <section class="content">
          <div class="error-page">
            <h2 class="headline text-warning">:(</h2>

            <div class="error-content">
              <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! User not found.</h3>

              <p>
                We could not find the User you were looking for.
                Meanwhile, you may <a href="{{ route('admin.home') }}">return to dashboard</a> or try using the search
                form.
              </p>

              <form action="{{ route('user.result', 'search') }}" method="GET">
                <div class="input-group">
                  <input type="search" name="q" class="form-control" placeholder="Ex: username, firstname, id, ... ">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
                <!-- /.input-group -->
              </form>
            </div>
            <!-- /.error-content -->
          </div>
          <!-- /.error-page -->
        </section>

      @endif
    </div>
    {{-- container-fluid --}}
  </div>
  <!-- /.content-header -->


@endsection
