@extends('admin.home')

@section('title', '| workspaces')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

@if (isset($workspaces) && $workspaces->count() > 0)


      @include('includes.successAlert')
      @include('includes.errorAlert')



      <section class="content">
        <div class="container-fluid">
          
            <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Workspaces</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 6%">ID</th>
                          <th style="width: 20%">Workspaces</th>
                          <th style="width: 20%">Projects</th>
                          <th style="width: 54%">Users</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($workspaces as $workspace)
                          <tr>
                            <td>{{ $workspace->id }}.</td>
                            <td>{{ $workspace->name }}</td>

                            <td>
                              @foreach ($workspace->projects as $project)
                                <a href="{{ route('project.show', [$project->id]) }}" class="text-secondary">
                                  {{ $project->name }} </a><br>

                              @endforeach
                            </td>
                            <td>
                              @foreach ($workspace->users as $user)
                                <a href="{{ route('user.profile', [$user->id]) }}" class="badge badge-info">
                                  {{ $user->name }} </a>
                              @endforeach
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                      {{ $workspaces->links() }}
                    </ul>
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    @else

      <!-- Main content -->
      <section class="content">
        <div class="error-page">
          <h2 class="headline text-warning">:(</h2>

          <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! User not found.</h3>

            <p>
              We could not find the Workspace you were looking for.
              Meanwhile, you may <a href="{{ route('admin.home') }}">return to dashboard</a> or try using the search
              form.
            </p>

            <form action="#" method="#">
              <div class="input-group">
                <input type="search" name="q" class="form-control" placeholder="########">
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


    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  @endif
@endsection
