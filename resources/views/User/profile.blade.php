@extends('layouts.master')


@section('content')

  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}
  <!-- Content Header (Page header) -->
  {{-- <section class="content-header"> --}}

  <div class="content-header">
    <div class="container-fluid">
      <!-- profile -->
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Main content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('Front/dist/img/user2-160x160.jpg') }}"
                  alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ $user->getFullNameAttribute() }}</h3>

              <p class="text-muted text-center">{{ $user->role->name }}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Account Status</b>
                  <p class="float-right">{{ $user->account_status->name }}</p>
                </li>

                <li class="list-group-item">
                  <b>WorkSpace</b> <a class="float-right">#</a>
                </li>
                <li class="list-group-item">
                  <b>Projects</b> <a class="float-right">#</a>
                </li>
                <li class="list-group-item">
                  <b>Completed tasks</b> <a class="float-right">#</a>
                </li>

                <li class="list-group-item">
                  <b>To do</b> <a class="float-right">#</a>
                </li>

              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fa fa-address-card mr-1"></i> Account status</strong>

              <p class="text-muted">
                {{ $user->account_status->name }}
              </p>

              <hr>

              <strong><i class="fa fa-calendar mr-1"></i> join in </strong>

              <p class="text-muted">{{ $user->created_at }}</p>

              <hr>

              <strong><i class="fa fa-envelope mr-1"></i> Email</strong>

              <p class="text-muted">{{ $user->email }}</p>


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->





        </div>
        <!-- /.col-md-3 -->

        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#projects" data-toggle="tab">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Tasks</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">SubTasks</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="projects">
                  <!-- Post -->
                  <div class="post">
                    <div class="user-block">
                      
                      <span class="username">
                        <a href="#">Jonathan Burke Jr.</a>
                        <a href="#" class="float-right btn-tool"></a>
                      </span>
                      <span class="description">Shared publicly - 7:30 PM today</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                      test
                    </p>

                  </div>
                  <!-- /.post -->

                  <!-- Post -->
                  <div class="post clearfix">
                    <div class="user-block">
                      
                      <span class="username">
                        <a href="#">Jonathan Burke Jr.</a>
                        <a href="#" class="float-right btn-tool"></a>
                      </span>
                      <span class="description">Shared publicly - 7:30 PM today</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                      test
                    </p>
                  </div>
                  <!-- /.post -->

                  <!-- Post -->
                  <div class="post">
                    <div class="user-block">
                      
                      <span class="username">
                        <a href="#">Jonathan Burke Jr.</a>
                        <a href="#" class="float-right btn-tool"></a>
                      </span>
                      <span class="description">Shared publicly - 7:30 PM today</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                      test
                    </p>

                  </div>
                  <!-- /.post -->
                </div>
                <!-- /.tab-pane -->
                
                <div class="tab-pane" id="timeline">
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-danger">
                        10 Feb. 2014
                      </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-envelope bg-primary"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 12:05</span>

                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                        <div class="timeline-body">
                         test
                        </div>
                        <div class="timeline-footer">
                          <a href="#" class="btn btn-primary btn-sm">Read more</a>
                          <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-user bg-info"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                        </h3>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-comments bg-warning"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                        <div class="timeline-body">
                          Take me to your leader!
                          Switzerland is small and neutral!
                          We are more like Germany, ambitious and misunderstood!
                        </div>
                        <div class="timeline-footer">
                          <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-success">
                        3 Jan. 2014
                      </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-camera bg-purple"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                        <div class="timeline-body">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <div>
                      <i class="far fa-clock bg-gray"></i>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>


      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

  </div>
@endsection
