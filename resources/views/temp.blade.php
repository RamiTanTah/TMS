@extends('layouts.master')

@section('content')

  {{-- <form action="{{ route('test.post',[5]) }}" method="POST" class="was-validated">
  @csrf --}}


  {{-- <div class="form-group">
  <label for="role_id">User role:</label>
  <select class="form-control" name="role_id"
    required autocomplete="role_id" autofocus  >

    <option selected="selected" value="{{ $user->role_id }}" >{{ $user->role->name }}</option>
    <option selected="selected" value="51" >fucccccccker</option>
  </select>
  <input hidden id="role_id" name="role_id" value="{{ $user->role_id }}"> 

  @error('role_id')
    <small class="form-text text-danger">{{ $message }}</small>
  @enderror
</div>
<!-- /.form-group -->
<button type="submit" class="btn btn-success">to</button> --}}


  {{-- <div class="form-group">
  <label>Multiple</label>
  <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" 
    name='users[]' size="{{ count($users) }}" >
    @foreach ($users as $user)
    <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
  </select>
  <button type="submit" class="btn btn-success">to</button>
</div>

</form> --}}



          <div class="row">
            <div class="col-6">
              {{-- space --}}
            </div>

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
                      @error('estimite_time') is-invalid @enderror >
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



        {{-- <div class="card-body table-responsive p-0">
                  <table class="table table-head-fixed text-nowrap">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>FirstName</th>
                              <th>Surname</th>
                              <th>Address</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Username</th>
                              <th>Password</th>
                              <th>NationalNumber</th>
                              

                          </tr>
                      </thead>
                      <tbody>

                          <tr>
                              <td>123</td>
                              <td>123</td>
                              <td>123</td>
                              <td>123</td>
                              <td>123</td>
                              <td>123</td>
                              <td>123</td>
                              <td>123</td>
                              <td>123</td>



                          </tr>
                      </tbody>
                  </table>
              </div> --}}


        {{-- <div class="modal-footer justify-content-between">
                  
                  <a href="#"
                      class="btn btn-danger">
                      edit Client informations </a>
              </div> --}}

      </div>





    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


















@endsection
