<div class="modal fade" id="modal-xl-{{ $project->id }}">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title mr-3">{{ $project->name }}</h4>

        @foreach ($project->users as $user)
          <a href="{{ route('user.profile', [$user->id]) }}" class="badge badge-info mr-1 mt-2"><i
              class="far	fa fa-user mr-1"></i>
            {{ $user->name }} </a><br>
        @endforeach

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- /.modal-header -->
      <div class="modal-body">
        {{-- Tasks --}}
        <div class="row">
          <div class="col-6">

            <div class="card">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  {{ $project->tasks->count() }} Task
                </h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <ul class="todo-list ui-sortable" data-widget="todo-list">
                  {{-- @if (isset($project->tasks) && $$project->tasks->count() > 0) --}}
                  @foreach ($project->tasks as $task)
                    <li>
                      <!-- drag handle -->
                      <span class="handle ui-sortable-handle">
                        <i class="fas fa-ellipsis-v"></i>
                        <i class="fas fa-ellipsis-v"></i>
                      </span>
                      <!-- checkbox -->
                      {{-- <div class=""> --}}
                      {{-- <input type="checkbox" value="" name="todo1" id="todoCheck1">
                          <label for="todoCheck1"></label> --}}
                      {{-- put dropdown or ???????? --}}
                      {{-- <i class="nav-icon 	fa fa-ellipsis-h"></i> --}}
                      {{-- </div> --}}
                      <!-- todo text -->
                      <span class="text">{{ $task->name }}</span>
                      <!-- Emphasis label -->
                      <small class="badge badge-warning"><i class="far fa fa-check-circle"></i>
                        {{ $task->task_status->name }}</small>
                      <small class="badge badge-danger"><i class="far fa-clock"></i> {{ $task->deadline }}</small>
                      @if (isset($task->users) && $task->users->count() > 0)
                        @foreach ($task->users as $user)
                          <small class="badge badge-info"><i class="far	fa fa-user"></i> {{ $user->name }}</small>
                        @endforeach
                      @endif
                      <!-- General tools such as edit or delete-->
                      <div class="tools">
                        <a href="{{ route('task.changeStatus', [$task->id]) }}" class="fas fa-edit">
                        </a>
                      </div>
                    </li>
                  @endforeach
                  {{-- @endif --}}
                </ul>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-6 -->

          {{-- Project informations --}}
          <div class="col-6">
            <div class="Form">
              <form action="{{ route('project.update', [$project->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card card-primary">

                  <div class="card-header">
                    <h3 class="card-title">Project info</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->

                  {{-- Project --}}
                  <div class="card-body">

                    <div class="form-group">
                      <label for="name">Project Name</label>
                      <input type="text" class="form-control" placeholder="{{ $project->name }}" id="name"
                        name="name" autocomplete="name" value="{{ old('name') }}" @error('name') is-invalid
                        @enderror>
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
                        placeholder="{{ $project->description }}" name="description"
                        value="{{ $project->description }}" @error('name') is-invalid @enderror></textarea>
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
                      <label for="project_status_id">status</label>
                      <select class="form-control" data-placeholder="{{ $project->project_status_id }}"
                        @error('project_status_id ')
                        is-invalid @enderror id="project_status_id" name="project_status_id">

                        <option selected value="{{ $project->project_status->id }}" disabled>
                          {{ $project->project_status->name }}
                        </option>
                        @if (isset($project_statuses) && $project_statuses->count() > 0)
                          @foreach ($project_statuses as $project_status)
                            <option value="{{ $project_status->id }}">{{ $project_status->name }}</option>
                          @endforeach
                        @endif
                      </select>

                      <!-- ### show message if we have any error in validation ### -->
                      @error(' project_status_id') <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <!-- /.form-group -->


                    {{-- ### start_date ### --}}
                    <div class="form-group">
                      <label for="start_date">start date:</label>
                      <input type="date" class="form-control" placeholder="{{ $project->start_date }}"
                        id="start_date" name="start_date" autocomplete="start_date"
                        value="{{ $project->start_date }}" @error('start_date') is-invalid @enderror min="2010-1-1"
                        max="2030-12-31">
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
                      <input type="date" class="form-control" placeholder="{{ $project->end_date }}" id="end_date"
                        name="end_date" autocomplete="end_date" value="{{ $project->end_date }}" @error('end_date')
                        is-invalid @enderror min="2010-1-1" max="2030-12-31">
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
                      <input type="date" class="form-control" placeholder="{{ $project->deadline }}" id="deadline"
                        name="deadline" autocomplete="deadline" value="{{ $project->deadline }}" @error('deadline')
                        is-invalid @enderror min="2010-1-1" max="2030-12-31">
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
                      <input type="number" class="form-control" placeholder="{{ $project->estimite_time }}"
                        id="estimite_time" name="estimite_time" autocomplete="estimite_time"
                        value="{{ $project->estimite_time }}" @error('estimite_time') is-invalid @enderror>
                      {{-- ### if the user not fill this field ### --}}
                      <div class="invalid-feedback">Please fill out this field.</div>

                      {{-- ### show message if we have any error in validation ### --}}
                      @error('estimite_time')
                        <small class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <!-- /.form-group -->


                    <div class="card-footer clearfix">
                      <button type="submit" class="btn btn-primary float-right"><i class="fas fa-plus"></i>
                        save
                      </button>
                    </div>




                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </form>
            </div>
            <!-- /.Form -->
          </div>
          <!-- /.col-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.modal-body -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal fade -->
