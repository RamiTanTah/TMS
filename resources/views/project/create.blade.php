@extends('admin.home')

@section('title', '| Project Add ')

@section('content')
  <div class="content-header">
    <div class="container-fluid">

      @include('includes.successAlert')
      @include('includes.errorAlert')


      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Project Add</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="Form">
          <form action="{{ route('projcet.store') }}" method="POST">
            @csrf



            <div class="row">
              <div class="col-md-6">
                <div class="card card-primary">

                  <div class="card-header">
                    <h3 class="card-title">General</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->

                  {{-- Project name --}}
                  <div class="card-body">

                    <div class="form-group">
                      <label for="name">Project Name</label>
                      <input type="text" class="form-control" placeholder="Enter Project name" id="name" name="name"
                        required autocomplete="name" value="{{ old('name') }}" @error('name') is-invalid @enderror>
                      {{-- ### if the user not fill this field ### --}}
                      <div class="invalid-feedback">Please fill out this field.</div>
                      {{-- ### show message if we have any error in validation ### --}}
                      @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <!-- /.form-group -->


                    {{-- project description --}}
                    <div class="form-group">
                      <label for="description">Project Description</label>
                      <textarea id="description" class="form-control" rows="4"
                        placeholder="Enter Description for your project" name="description"
                        value="{{ old('description') }}" @error('name') is-invalid @enderror></textarea>
                      {{-- ### if the user not fill this field ### --}}
                      <div class="invalid-feedback">Please fill out this field.</div>
                      {{-- ### show message if we have any error in validation ### --}}
                      @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <!-- /.form-group -->

                    {{-- status --}}
                    <div class="form-group">
                      <label for="status">status</label>
                      <select class="form-control" data-placeholder="Select a project status" @error('status') is-invalid
                        @enderror id="status" name="status" required>

                        <option selected value="" disabled> Select a Project status</option>
                        @if (isset($project_statuses) && $project_statuses->count() > 0)
                          @foreach ($project_statuses as $project_status)
                            <option value="{{ $project_status->id }}">{{ $project_status->name }}</option>
                          @endforeach
                        @endif
                      </select>

                      {{-- ### show message if we have any error in validation ### --}}
                      @error('status')
                        <small class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <!-- /.form-group -->

                    {{-- ### workspace ### --}}
                    <div class="form-group">
                      <label for="workspace">workspace</label>
                      <select class="form-control" data-placeholder="Select a workspace" @error('workspace') is-invalid
                        @enderror id="workspace" name="workspace" required>

                        <option selected value="" disabled> Select a workspace</option>
                        @if (isset($workspaces) && $workspaces->count() > 0)
                          @foreach ($workspaces as $workspace)
                            <option value="{{ $workspace->id }}">{{ $workspace->name }}</option>
                          @endforeach
                        @endif
                      </select>

                      {{-- ### show message if we have any error in validation ### --}}
                      @error('workspace')
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

              <div class="col-md-6">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Time budget</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>

                  <div class="card-body">
                    {{-- ### start_date ### --}}
                    <div class="form-group">
                      <label for="start_date">start date:</label>
                      <input type="date" class="form-control" placeholder="start date" id="start_date" name="start_date" 
                        autocomplete="start_date" value="{{ old('start_date') }}" @error('start_date') is-invalid
                        @enderror min="2010-1-1" max="2030-12-31">
                      {{-- ### if the user not fill this field ### --}}
                      <div class="invalid-feedback">Please fill out this field.</div>

                      {{-- ### show message if we have any error in validation ### --}}
                      @error('start_date')
                        <small class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    {{-- ### end_date ### --}}
                    <div class="form-group">
                      <label for="end_date">end date:</label>
                      <input type="date" class="form-control" placeholder="end date" id="end_date" name="end_date" 
                        autocomplete="end_date" value="{{ old('end_date') }}" @error('end_date') is-invalid @enderror
                        min="2010-1-1" max="2030-12-31">
                      {{-- ### if the user not fill this field ### --}}
                      <div class="invalid-feedback">Please fill out this field.</div>

                      {{-- ### show message if we have any error in validation ### --}}
                      @error('end_date')
                        <small class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    {{-- ### deadline ### --}}
                    <div class="form-group">
                      <label for="deadline">deadline:</label>
                      <input type="date" class="form-control" placeholder="dead line" id="deadline" name="deadline" 
                        autocomplete="deadline" value="{{ old('deadline') }}" @error('deadline') is-invalid @enderror
                        min="2010-1-1" max="2030-12-31">
                      {{-- ### if the user not fill this field ### --}}
                      <div class="invalid-feedback">Please fill out this field.</div>

                      {{-- ### show message if we have any error in validation ### --}}
                      @error('deadline')
                        <small class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <!-- /.form-group -->

                    {{-- ### estimite_time ### --}}
                    <div class="form-group">
                      <label for="estimite_time">estimite time:</label>
                      <input type="number" class="form-control" placeholder="enter time  e.g. 3h,20m" id="estimite_time"
                        name="estimite_time" autocomplete="estimite_time" value="{{ old('estimite_time') }}"
                        @error('estimite_time') is-invalid @enderror >
                      {{-- ### if the user not fill this field ### --}}
                      <div class="invalid-feedback">Please fill out this field.</div>

                      {{-- ### show message if we have any error in validation ### --}}
                      @error('estimite_time')
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
            <!--/.row-->

            <div class="row">
              <div class="col-md-4 offset-md-5">
                <button type="submit" class="btn btn-success ">Create New project</button>
                <a href="{{ route('home') }}" class="btn btn-secondary ">Cancel</a>
              </div>
              <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->

          </form>
        </div>
        <!--/.Form-->




      </section>
      <!-- /.content -->


    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header-->
@endsection
