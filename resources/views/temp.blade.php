@extends('layouts.master')

@section('content')

<form action="{{ route('test.post',[$user->id]) }}" method="POST" class="was-validated">
  @csrf



<div class="form-group">
  <label for="role_id">User role:</label>
  <select class="form-control" name="role_id"
    required autocomplete="role_id" autofocus  >

    <option selected="selected" value="{{ $user->role_id }}" >{{ $user->role->name }}</option>
    <option selected="selected" value="51" >fucccccccker</option>
  </select>
  {{-- <input hidden id="role_id" name="role_id" value="{{ $user->role_id }}"> --}}

  {{-- ### show message if we have any error in validation ### --}}
  @error('role_id')
    <small class="form-text text-danger">{{ $message }}</small>
  @enderror
</div>
<!-- /.form-group -->
<button type="submit" class="btn btn-success">to</button>

</form>


@endsection
