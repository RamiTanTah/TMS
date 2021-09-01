<div class="modal fade" id="modal-xl-{{ $workspace->name }}">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title mr-3">Add new Project to {{ $workspace->name }}</h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- /.modal-header -->
      <div class="modal-body">
        <div class="Form">
          <form action="{{ route('project.store') }}" method="POST">
            @csrf
            {{-- New Project --}}
            <div class="row">

              <div class="col-md-6">
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

                  {{-- Project name --}}
                  <div class="card-body">

                    <div class="form-group">
                      <label for="name">Project Name</label>
                      <input type="text" class="form-control" placeholder="Enter Project name" id="name" name="name"
                        required autocomplete="name" value="{{ old('name') }}" @error('name') is-invalid @enderror>
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
                        placeholder="Enter Description for your project" name="description"
                        value="{{ old('description') }}" @error('description') is-invalid @enderror></textarea>
                      {{-- ### if the user not fill this field ### --}}
                      <div class="invalid-feedback">Please fill out this field.</div>
                      {{-- ### show message if we have any error in validation ### --}}
                      @error('description')
                        <small class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <!-- /.form-group -->


                    <div class="form-group">
                      <label for="workspace_id">workspace</label>
                      <input type="text" class="form-control" placeholder="{{ $workspace->name }}" 
                        autocomplete="workspace_id" value="{{ $workspace->name }}" @error('workspace_id') is-invalid @enderror disabled>
                        <input hidden type="text" id="workspace_id" name="workspace_id" value="{{ $workspace->id }}">
                      {{-- ### if the user not fill this field ### --}}
                      <div class="invalid-feedback">Please fill out this field.</div>
                      {{-- ### show message if we have any error in validation ### --}}
                      @error('workspace_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <!-- /.form-group -->

                    {{-- status --}}
                    <div class="form-group">
                      <label for="project_status_id">status</label>
                      <select class="form-control"  @error('project_status_id')
                        is-invalid @enderror id="project_status_id" name="project_status_id" required>

                        <option selected value="" disabled> Select a Project status</option>
                        @if (isset($project_statuses) && $project_statuses->count() > 0)
                          @foreach ($project_statuses as $project_status)
                            <option value="{{ $project_status->id }}">{{ $project_status->name }}</option>
                          @endforeach
                        @endif
                      </select>

                      {{-- ### show message if we have any error in validation ### --}}
                      @error('project_status_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <!-- /.form-group -->

                    

                    <!-- Members in workspace -->
                    <div class="form-group">
                      <label>Members</label>
                      <select class="select2" multiple="multiple" data-placeholder="Select a member"
                        style="width: 100%;" name='members[]' size="{{ count($workspace->users) }}"
                        @error('member[]') is-invalid @enderror value='0'>

                        @if (isset($workspace->users) && $workspace->users->count() > 0)
                          @foreach ($workspace->users as $user)
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

                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col-md-6 -->

              <div class="col-md-6">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Time budget</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>

                  <div class="card-body">
                    {{-- ### start_date ### --}}
                    <div class="form-group">
                      <label for="start_date">start date:</label>
                      <input type="date" class="form-control" placeholder="start date" id="start_date" name="start_date"
                        autocomplete="start_date" value="{{ old('start_date') }}" @error('start_date') is-invalid
                        @enderror min="2010-1-1" max="2030-12-31">
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
                      <input type="date" class="form-control" placeholder="end date" id="end_date" name="end_date"
                        autocomplete="end_date" value="{{ old('end_date') }}" @error('end_date') is-invalid @enderror
                        min="2010-1-1" max="2030-12-31">
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
                      <input type="date" class="form-control" placeholder="dead line" id="deadline" name="deadline"
                        autocomplete="deadline" value="{{ old('deadline') }}" @error('deadline') is-invalid @enderror
                        min="2010-1-1" max="2030-12-31">
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
                      <input type="number" class="form-control" placeholder="enter time  e.g. 3h,20m" id="estimite_time"
                        name="estimite_time" autocomplete="estimite_time" value="{{ old('estimite_time') }}"
                        @error('estimite_time') is-invalid @enderror>
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
              <!-- /.col-md-6 -->

            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-md-4 offset-md-5">
                <button type="submit" class="btn btn-success ">Create New project</button>
              </div>
            </div>
            <!-- /.row -->

          </form>
        </div>
        <!-- /.Form -->
      </div>
      <!-- /.modal-body -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal fade -->
