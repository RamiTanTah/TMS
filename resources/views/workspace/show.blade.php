@extends('layouts.admin')

@section('title', '| workspace')

@section('navbarLeftContent')



@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

      @include('includes.successAlert')
      @include('includes.errorAlert')


      {{-- header --}}
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{{ $workspace->name }}</h1>

            </div>
            <div class="col-sm-6">
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>


      <div class="row">

        @if (isset($workspace->projects) && $workspace->projects->count() > 0)
          @foreach ($workspace->projects as $project)
            <div class="col-3">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    {{ $project->name }}
                    <span class="badge badge-info right">{{ $project->tasks->count() }}</span>
                  </h3>
                  <i class="card-title float-right">
                    <button type="button" class="btn p-0 ml-1" data-toggle="modal"
                      data-target="#modal-xl-user-{{ $project->name }}">
                      <i class="nav-icon 	fa fa-user-plus"></i>
                    </button>
                    <button type="button" class="btn p-0" data-toggle="modal"
                      data-target="#modal-xl-{{ $project->name }}">
                      <i class="nav-icon 	fas fa-plus"></i>
                    </button>
                  </i>
                  @include('workspace.partials.modals.addMemberToProject')
                  @include('task.partials.modals.create')

                </div>
                <!-- /.card-header -->
                {{-- task -To Do --}}
                <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                    </thead>
                    <tbody>
                      @if (isset($project->tasks) && $project->tasks->count() > 0)
                        @foreach ($project->tasks as $task)
                          <tr>
                            <td style="width: 5%">
                              <i class="card-title">
                                <button type="button" class="btn p-0" data-toggle="modal"
                                  data-target="#modal-xl-{{ $task->id }}">
                                  <i class="nav-icon 	fa fa-ellipsis-h"></i>
                                </button>
                              </i>
                              {{-- @include('project.partials.Modals.edit') --}}
                            </td>
                            <td>
                              <a href="#" class="text-secondary">
                                ({{ $task->id }}) - {{ $task->name }}
                              </a>
                            </td>
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
          @endforeach
        @endif
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-headers -->

@endsection
