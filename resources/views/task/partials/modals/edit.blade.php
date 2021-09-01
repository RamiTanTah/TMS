<div class="modal fade" id="modal-xl-{{ $task->id }}">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title mr-3">{{ $task->name }}</h4>

        @foreach ($task->users as $user)
          <a href="{{ route('user.profile', [$user->id]) }}" class="badge badge-info mr-1 mt-2"><i
              class="far	fa fa-user"></i>
            {{ $user->name }} </a><br>
        @endforeach

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- /.modal-header -->
      <div class="modal-body">
        {{-- subTasks --}}
        <div class="row">
          <div clfss="col-6">

            <div class="card">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  {{ $task->sub_tasks->count() }} Subtask
                </h3>
              </div>
              <!-- /.card-header -->


              <div class="card-body">
                <ul class="todo-list ui-sortable" data-widget="todo-list">
                  @if (isset($task->sub_tasks) && $task->sub_tasks->count() > 0)
                    @foreach ($task->sub_tasks as $sub_task)
                      <li>
                        <!-- drag handle -->
                        <span class="handle ui-sortable-handle">
                          <i class="fas fa-ellipsis-v"></i>
                          <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <!-- checkbox -->
                        <div class="icheck-primary d-inline ml-2">
                          <input type="checkbox" value="" name="todo1" id="todoCheck1">
                          <label for="todoCheck1"></label>
                        </div>
                        <!-- todo text -->
                        <span class="text">{{ $sub_task->name }}</span>
                        <!-- Emphasis label -->
                        <small class="badge badge-warning"><i class="far fa fa-check-circle"></i>
                          {{ $sub_task->task_status->name }}</small>
                        <small class="badge badge-info"><i class="far fa-clock"></i> {{ $sub_task->deadline }}</small>
                        <small class="badge badge-info"><i class="far	fa fa-user"></i>
                          {{ $sub_task->user->name }}</small>
                        <!-- General tools such as edit or delete-->
                        <div class="tools">
                          <i class="fas fa-edit"></i>
                        </div>
                      </li>
                    @endforeach
                  @endif
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i>
                  Add subtask
                </button>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-6 -->

          {{-- task informations --}}
          <div class="col-6">
            <form method="POST" action="{{ route('task.updateStatus', [$task->id]) }}">
              @csrf

              <div class="card card-primary">

                <div class="card-header">
                  <h3 class="card-title">General</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->

                {{-- task --}}
                <div class="card-body">

                  <div class="form-group">
                    <label for="name">Task Name</label>
                    <input type="text" class="form-control" placeholder="{{ $task->name }}" id="name" name="name"
                      required autocomplete="name" value="{{ $task->name }}" @error('name') is-invalid @enderror>
                    {{-- ### if the user not fill this field ### --}}
                    <div class="invalid-feedback">Please fill out this field.</div>
                    {{-- ### show message if we have any error in validation ### --}}
                    @error('name')
                      <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <!-- /.form-group -->


                  {{-- task description --}}
                  <div class="form-group">
                    <label for="description">task Description</label>
                    <textarea id="description" class="form-control" rows="4" placeholder="{{ $task->description }}"
                      name="description" value="{{ $task->description }}" @error('name') is-invalid
                      @enderror></textarea>
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

                      <option selected value="{{ $task->task_status->id }}" disabled>
                        {{ $task->task_status->name }}
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

                  {{-- ### start_date ### --}}
                  <div class="form-group">
                    <label for="start_date">start date:</label>
                    <input type="date" class="form-control" placeholder="{{ $task->start_date }}" id="start_date"
                      name="start_date" autocomplete="start_date" value="{{ $task->start_date }}"
                      @error('start_date') is-invalid @enderror min="2010-1-1" max="2030-12-31">
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
                    <input type="date" class="form-control" placeholder="{{ $task->end_date }}" id="end_date"
                      name="end_date" autocomplete="end_date" value="{{ $task->end_date }}" @error('end_date')
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
                    <input type="date" class="form-control" placeholder="{{ $task->deadline }}" id="deadline"
                      name="deadline" autocomplete="deadline" value="{{ $task->deadline }}" @error('deadline')
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
                    <input type="number" class="form-control" placeholder="{{ $task->estimite_time }}"
                      id="estimite_time" name="estimite_time" autocomplete="estimite_time"
                      value="{{ $task->estimite_time }}" @error('estimite_time') is-invalid @enderror>
                    {{-- ### if the user not fill this field ### --}}
                    <div class="invalid-feedback">Please fill out this field.</div>

                    {{-- ### show message if we have any error in validation ### --}}
                    @error('estimite_time')
                      <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <!-- /.form-group -->'



                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->


          </div>
          <!-- /.col-6 -->



        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-4 offset-md-5">
            <button type="submit" class="btn btn-success ">update task</button>
          </div>
          <!-- /.col-md-6 -->
        </div>
        </form>
      </div>
      <!-- /.modal-body -->

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal fade -->
