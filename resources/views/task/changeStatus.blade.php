@extends('layouts.admin')

@section('title', '| change status')

@section('content')
  <div class="content-header">
    <div class="container-fluid">

      @include('includes.successAlert')
      @include('includes.errorAlert')


      <!-- Content Header (Page header) -->

      <div class="container-fluid">
        <div class="row mb-3">

          <div class="col-sm-6 offset-md-3">
            <h1 class="text-center">Change Task Status</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->

      <!-- Main content -->
      <section class="content">
        <div class="Form">
          <form action="{{ route('task.updateStatus',[$task->id]) }}" method="POST">
            @csrf
            {{-- @method('PUT') --}}

            <div class="row">
              <div class="col-md-6 offset-md-3">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">
                      {{ $task->project->workspace->name }} / {{ $task->project->name }}
                    </h3>
                  </div>


                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Task Name</label>
                      <input type="text" class="form-control" placeholder="{{ $task->name }}" id="name" name="name"
                        autocomplete="name" value="{{ $task->name }}" @error('name') is-invalid @enderror
                        disabled>
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
                      <label for="task_status_id">status</label>
                      <select class="form-control" data-placeholder="{{ $task->task_status->name }}" @error('task_status_id')
                        is-invalid @enderror id="task_status_id" name="task_status_id" required>

                        <option selected value="{{ $task->task_status->id }}" disabled>{{ $task->task_status->name }}
                        </option>
                        @if (isset($task_statuses) && $task_statuses->count() > 0)
                          @foreach ($task_statuses as $task_statuses)
                            <option value="{{ $task_statuses->id }}">{{ $task_statuses->name }}</option>
                          @endforeach
                        @endif
                      </select>

                      {{-- ### show message if we have any error in validation ### --}}
                      @error('task_status_id')
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
                <button type="submit" class="btn btn-success ">change status</button>
                <a href="{{ route('project.show',[$task->project->id]) }}" class="btn btn-secondary float-right">Cancel</a>
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
@endsection


