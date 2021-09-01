@extends('admin.home')

@section('title', '| search')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <!-- Main content -->
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <h2 class="text-center display-4">Enter Workspace info</h2>
          <form action="#" method="#">

            <div class="input-group">
              <input type="search" class="form-control form-control-lg" placeholder="Ex: workspace name, workspace id, ... "
              name="q">
                
              <div class="input-group-append">
                <button type="submit" class="btn btn-lg btn-default">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <!--/.col-md-8-->
      </div>
      <!--/.row-->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  @endsection

