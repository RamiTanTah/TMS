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
              <h1>DashBoard</h1>
            </div>
            <div class="col-sm-6">
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <div class="row">

        @if (isset($workspaces) && $workspaces->count() > 0)
          @foreach ($workspaces as $workspace)
            <div class="col-3">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <a href="{{ route('workspace.show',[$workspace->id]) }}">{{ $workspace->name }}</a>
                    <span class="badge badge-info right">{{ $workspace->projects->count() }}</span>
                  </h3>
                  <i class="card-title float-right">
                    <button type="button" class="btn p-0" data-toggle="modal" data-target="#modal-xl-{{ $workspace->name }}">
                      <i class="nav-icon 	fas fa-plus"></i>
                    </button>
                  </i>
                  @include('project.partials.Modals.create')

                </div>
                <!-- /.card-header -->
                {{-- task -To Do --}}
                <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                    </thead>
                    <tbody>
                      @if (isset($workspace->projects) && $workspace->projects->count() > 0)
                        @foreach ($workspace->projects as $project)
                          <tr>
                            <td style="width: 5%">
                              <i class="card-title">
                                <button type="button" class="btn p-0" data-toggle="modal"
                                  data-target="#modal-xl-{{ $project->id }}">
                                  <i class="nav-icon 	fa fa-ellipsis-h"></i>
                                </button>
                              </i>
                              @include('project.partials.Modals.edit')
                            </td>
                            <td>
                              <a href="{{ route('project.show', [$project->id]) }}" class="text-secondary">
                                ({{ $project->id }}) - {{ $project->name }}
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
