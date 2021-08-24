@extends('layouts.master')

@section('content')

<form action="{{ route('test.post',[5]) }}" method="POST" class="was-validated">
  @csrf


{{-- 
<div class="form-group">
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


<div class="form-group">
  <label>Multiple</label>
  <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" 
    name='users[]' size="{{ count($users) }}" >
    @foreach ($users as $user)
    <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
  </select>
  <button type="submit" class="btn btn-success">to</button>
</div>

</form>


@endsection
