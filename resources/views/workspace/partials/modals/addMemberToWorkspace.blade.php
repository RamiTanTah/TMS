<div class="modal fade" id="modal-xl-adduser-{{ $workspace->name }}">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title mr-3">Add new user to {{ $workspace->name }}</h4>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- /.modal-header -->
      <div class="modal-body">

        <form action="{{ route('workspace.update', [$workspace->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">

            {{-- project members --}}
            <div class="col-6">

              <div class="card card-primary">

                <div class="card-header">
                  <h3 class="card-title">member info</h3>

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

                  <!-- Members -->
                  <div class="form-group">
                    <label>Members</label>
                    <select class="select2" multiple="multiple" data-placeholder="Select a member" style="width: 100%;"
                      name='members[]' size="{{ count($users) }}" @error('member[]') is-invalid @enderror value='0'
                      required>

                      @if (isset($users) && $users->count() > 0)
                        @foreach ($users as $user)
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
            <!-- /.col-6 -->

          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-md-4 offset-md-5">
              <button type="submit" class="btn btn-success ">Add members</button>
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
