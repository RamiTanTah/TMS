@extends('admin.home')

@section('title', '|workspaces')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

      @include('includes.successAlert')
      @include('includes.errorAlert')



      <section class="content">
        <div class="container-fluid">
          @if (isset($workspaces) && $workspaces->count() > 0)
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
                        <th style="width: 37%">Projects</th>
                        <th style="width: 37%">Users</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($workspaces as $workspace)
                      <tr>
                        <td >{{ $workspace->id }}.</td>
                        <td>{{ $workspace->name }}</td>
                        <td>#</td>
                        <td>
                        @foreach ($workspace->users as $user)
                        <span class="badge bg-primary">{{ $user->name }}</span>
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
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
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
          
          @endif
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

    @endsection
