@extends('layouts.master')

@section('title','| Home')


@section('sidebarContent')
 
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-users-cog"></i>
    <p>
      Users
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class=" fas fa-user-plus"></i>
        <p>Create New user</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far fas fa-user-cog"></i>
        <p>Show/Edit User</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far fas fa-users"></i>
        <p>show All Users</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-layer-group"></i>
    <p>
      Workspaces
      <i class="fas fa-angle-left right"></i>
      <span class="badge badge-info right">2</span>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>workspcec 1</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>workspace 2</p>
      </a>
    </li>
  </ul>
</li> 

@endsection




