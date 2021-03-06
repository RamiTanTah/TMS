@extends('admin.home')

@section('title', '| Projects')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-4">
              <h1>{{ $project->name }} - {{ $project->workspace->name }}</h1>
            </div>
            <div class="col-sm-4">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl-newTask">
                <i class="nav-icon 	fas fa-plus"></i>New task
              </button>
              @include('task.partials.modals.create')
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      @include('includes.successAlert')
      @include('includes.errorAlert')

      <div class="row">


        <div class="col-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                To Do
                <span class="badge badge-info right">{{ $task_toDo->count() }}</span>
              </h3>
              <i class="card-title float-right">
                {{-- <button type="button" class="btn p-0" data-toggle="modal" data-target="#modal-xl-ToDo">
                  <i class="nav-icon 	fas fa-plus"></i>
                </button> --}}
              </i>
            </div>
            <!-- /.card-header -->
            {{-- task -To Do --}}
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                </thead>
                <tbody>
                  @if(isset($task_toDo) && $task_toDo -> count()>0)
                  @foreach ($task_toDo as $task)
                    <tr>
                      <td style="width: 5%">
                        <i class="card-title">
                          <button type="button" class="btn p-0" data-toggle="modal"
                            data-target="#modal-xl-{{ $task->id }}">
                            <i class="nav-icon 	fa fa-ellipsis-h"></i>
                          </button>
                        </i>
                        @include('task.partials.modals.edit')
                      </td>

                      <td>{{ $task->name }}-({{ $task->id }})</td>

                    </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-3 -->

        <div class="col-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                Progress
                <span class="badge badge-info right">{{ $task_progress->count() }}</span>
              </h3>
              <i class="card-title float-right">
                {{-- <button type="button" class="btn p-0" data-toggle="modal" data-target="#modal-xl-progress">
                  <i class="nav-icon 	fas fa-plus"></i>
                </button> --}}
              </i>
            </div>
            <!-- /.card-header -->

            {{-- task progress --}}
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                </thead>
                <tbody>
                  @if(isset($task_progress) && $task_progress -> count()>0)
                  @foreach ($task_progress as $task)
                    <tr>
                      <td style="width: 5%">
                        <i class="card-title">
                          <button type="button" class="btn p-0" data-toggle="modal"
                            data-target="#modal-xl-{{ $task->id }}">
                            <i class="nav-icon 	fa fa-ellipsis-h"></i>
                          </button>
                        </i>
                        @include('task.partials.modals.edit')
                      </td>
                      <td>{{ $task->name }}-({{ $task->id }})</td>
                    </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-3 -->

        <div class="col-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Review <span class="badge badge-info right">{{ $task_review->count() }}</span>
              </h3>
              <i class="card-title float-right">
                {{-- <button type="button" class="btn p-0" data-toggle="modal" data-target="#modal-xl-review">
                  <i class="nav-icon 	fas fa-plus"></i>
                </button> --}}
              </i>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                </thead>
                <tbody>
                  @if(isset($task_review) && $task_review -> count()>0)
                  @foreach ($task_review as $task)
                    <tr>
                      <td style="width: 5%">
                        <i class="card-title">
                          <button type="button" class="btn p-0" data-toggle="modal"
                            data-target="#modal-xl-{{ $task->id }}">
                            <i class="nav-icon 	fa fa-ellipsis-h"></i>
                          </button>
                        </i>
                        @include('task.partials.modals.edit')
                      </td>
                      <td>{{ $task->name }}-({{ $task->id }})</td>
                    </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-3 -->
        <div class="col-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Complete <span class="badge badge-info right">{{ $task_complete->count() }}</span>
              </h3>
              <i class="card-title float-right">
                {{-- <button type="button" class="btn p-0" data-toggle="modal" data-target="#modal-xl-complete">
                  <i class="nav-icon 	fas fa-plus"></i>
                </button> --}}
              </i>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                </thead>
                <tbody>
                  @if(isset($task_complete) && $task_complete -> count()>0)
                  @foreach ($task_complete as $task)
                    <tr>
                      <td style="width: 5%">
                        <i class="card-title">
                          <button type="button" class="btn p-0" data-toggle="modal"
                            data-target="#modal-xl-{{ $task->id }}">
                            <i class="nav-icon 	fa fa-ellipsis-h"></i>
                          </button>
                        </i>
                        @include('task.partials.modals.edit')
                      </td>
                      <td>{{ $task->name }}-({{ $task->id }})</td>
                    </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-3 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-headers -->

@endsection
