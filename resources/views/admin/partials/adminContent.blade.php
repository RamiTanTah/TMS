@extends('admin.home')

@section('title', '| Dashboard')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

      {{-- header --}}
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>DashBoard</h1>
            </div>
            <div class="col-sm-6">
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      @include('includes.successAlert')
      @include('includes.errorAlert')

      <div class="row">

      
      @if (isset($workspaces) && $workspaces->count() > 0)
      @foreach ($workspaces as $workspace )
      <div class="col-3">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              {{ $workspace->name }}
              <span class="badge badge-info right">{{ $workspace->projects->count() }}</span>
            </h3>
            <i class="card-title float-right">
              <button type="button" class="btn p-0" data-toggle="modal" data-target="#modal-xl-ToDo">
                <i class="nav-icon 	fas fa-plus"></i>
              </button>
            </i>
          </div>
          <!-- /.card-header -->
          {{-- task -To Do --}}
          <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
              <thead>
              </thead>
              <tbody>
                @foreach ($workspace->projects as $project)
                  <tr>
                    <td>
                      {{-- <i class="card-title float-right"><a href="#" class="nav-icon 	"></a></i> --}}

                      <i class="card-title float-right">
                        <button type="button" class="btn p-0" data-toggle="modal"
                          data-target="#modal-xl-{{ $project->id }}">
                          <i class="nav-icon 	fa fa-ellipsis-h"></i>
                        </button>
                      </i>

                      {{-- @include('task.partials.edit') --}}
                    </td>

                    <td><a href="{{ route('projcet.show',[$project->id]) }}" class="text-secondary">({{ $project->id }}) - {{ $project->name }}</a></td>

                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col-3 -->

      @endforeach
    </div>
    <!-- /.row -->

  
      @endif






    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-headers -->

@endsection
