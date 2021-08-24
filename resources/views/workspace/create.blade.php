@extends('admin.home')

@section('title', '| Add workspace')

@section('content')
  <div class="content-header">
    <div class="container-fluid">

      @include('includes.successAlert')
      @include('includes.errorAlert')


      <!-- Content Header (Page header) -->

      <div class="container-fluid">
        <div class="row mb-3">

          <div class="col-sm-6 offset-md-3">
            <h1 class="text-center">Workspace Create</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->

      <!-- Main content -->
      <section class="content">
        <div class="Form">
          <form action="{{ route('workspace.store') }}" method="POST">
            @csrf

            <div class="row">
              <div class="col-md-6 offset-md-3">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">General</h3>
                  </div>


                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Workspace Name</label>
                      <input type="text" class="form-control" placeholder="Enter Workspace name" id="name" name="name"
                        required autocomplete="name" value="{{ old('name') }}" @error('name') is-invalid @enderror>
                      {{-- ### if the user not fill this field ### --}}
                      <div class="invalid-feedback">Please fill out this field.</div>
                      {{-- ### show message if we have any error in validation ### --}}
                      @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <!-- /.form-group -->

                    <!-- Members -->
                    <div class="form-group">
                      <label>Members</label>
                      <select class="select2" multiple="multiple" data-placeholder="Select a member" style="width: 100%;"
                        name='members[]' size="{{ count($users) }}" @error('member[]') is-invalid @enderror
                        value='0'>

                        @if (isset($users) && $users->count() > 0)
                          @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                        @endif
                      </select>

                      {{-- ### show message if we have any error in validation ### --}}
                      @error('members[]')
                        <small class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <!-- /.form-group -->

                    {{-- ### manager ### --}}
                    <div class="form-group">
                      <label for="manager">Manager</label>
                      <select class="form-control" data-placeholder="Select a workspace manager" @error('manager')
                        is-invalid @enderror id="manager" name="manager" value='0'>

                        <option selected value="" disabled> Select a workspace manager</option>
                        @if (isset($users) && $users->count() > 0)
                          @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                        @endif
                      </select>

                      {{-- ### show message if we have any error in validation ### --}}
                      @error('manager')
                        <small class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.card-body -->

                </div>
                <!-- /.card -->
              </div>
              <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-6 offset-md-3">
                <button type="submit" class="btn btn-success ">Create New Workspace</button>
                <a href="{{ route('admin.home') }}" class="btn btn-secondary float-right">Cancel</a>
              </div>
              <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
          </form>
        </div>
        <!-- /.Form -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  </section>
@endsection
