<div class="modal fade" id="modal-xl-newTask">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title mr-3">Add new task to {{ $project->name }}</h4>
        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- /.modal-header -->
      <div class="modal-body">
        {{-- subTasks --}}

        <form action="{{ route('task.store') }}" method="POST">
          @csrf
        
        <div class="row">
          
          {{-- task informations --}}
          <div class="col-6 offset-md-3">

            <div class="card card-primary">

              <div class="card-header">
                <h3 class="card-title">Task info</h3>

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

                {{-- task name --}}
                <div class="form-group">
                  <label for="name">Task Name</label>
                  <input type="text" class="form-control" placeholder="Enter Task name" id="name" name="name"
                    required autocomplete="name" value="{{ old('name') }}" @error('name') is-invalid @enderror>
                  {{-- ### if the user not fill this field ### --}}
                  <div class="invalid-feedback">Please fill out this field.</div>
                  {{-- ### show message if we have any error in validation ### --}}
                  @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <!-- /.form-group -->

                {{-- project name --}}
                <div class="form-group">
                  <label for="name">Project name</label>
                  <input type="text" class="form-control" placeholder="{{ $project->name }}" 
                    required autocomplete="name" value="{{ $project->name }}" @error('project_id') is-invalid @enderror disabled>
                    <input type="text" hidden class="form-control" value="{{ $project->id }}" id="project_id" name="project_id">
                </div>
                <!-- /.form-group -->

                <!-- Members -->
                <div class="form-group">
                  <label>Members</label>
                  <select class="select2" multiple="multiple" data-placeholder="Select a member" style="width: 100%;"
                    name='members[]' size="{{ count($project->users) }}" @error('member[]') is-invalid @enderror
                    value='0'>

                    @if (isset($project->users) && $project->users->count() > 0)
                      @foreach ($project->users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endforeach
                    @endif
                  </select>

                  {{-- ### show message if we have any error in validation ### --}}
                  @error('members[]')
                    <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <!-- /.form-group -->


                {{-- task description --}}
                <div class="form-group">
                  <label for="description">task Description</label>
                  <textarea id="description" class="form-control" rows="4" placeholder="description"
                    name="description" value="{{ old('description') }}" @error('name') is-invalid
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
                  <label for="status">status</label>
                  <select class="form-control" data-placeholder="select task status" @error('status')
                    is-invalid @enderror id="status" name="status" required>

                    <option selected value="" disabled>select task status
                    </option>
                    @if (isset($task_statuses) && $task_statuses->count() > 0)
                      @foreach ($task_statuses as $task_status)
                        <option value="{{ $task_status->id }}">{{ $task_status->name }}</option>
                      @endforeach
                    @endif
                  </select>

                  {{-- ### show message if we have any error in validation ### --}}
                  @error('status')
                    <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <!-- /.form-group -->

                {{-- ### start_date ### --}}
                <div class="form-group">
                  <label for="start_date">start date:</label>
                  <input type="date" class="form-control" placeholder="start date" id="start_date"
                    name="start_date" autocomplete="start_date" value="{{ old('start_date') }}" @error('start_date')
                    is-invalid @enderror min="2010-1-1" max="2030-12-31">
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
                  <input type="date" class="form-control" placeholder="end date" id="end_date"
                    name="end_date" autocomplete="end_date" value="{{ old('end_date') }}" @error('end_date')
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
                  <input type="date" class="form-control" placeholder="deadline" id="deadline"
                    name="deadline" autocomplete="deadline" value="{{ old('deadline') }}" @error('deadline')
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
                  <input type="number" class="form-control" placeholder="eg. 3h 20m"
                    id="estimite_time" name="estimite_time" autocomplete="estimite_time"
                    value="{{ old('estimite_time') }}" @error('estimite_time') is-invalid @enderror>
                  {{-- ### if the user not fill this field ### --}}
                  <div class="invalid-feedback">Please fill out this field.</div>

                  {{-- ### show message if we have any error in validation ### --}}
                  @error('estimite_time')
                    <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <!-- /.form-group -->


                

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
            <button type="submit" class="btn btn-success ">Create New Task</button>
          </div>
        </div>
        <!-- /.row -->
      </form>

      </div>
      <!-- /.modal-body -->

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal fade -->
