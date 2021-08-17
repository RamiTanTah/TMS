@extends('layouts.master')

@section('sidebar')


<li class="nav-header">Main operations</li>

<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon far fa-id-card"></i>
    <p>
      page1
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>

  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="fas fa-plus-square nav-icon"></i>
        <p>
          Add
          <i class="fas fa-angle-left right nav-icon"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fas fa-user-alt nav-icon"></i>
            <p>Add client</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far  	fas fa-id-card-alt nav-icon"></i>
            <p>Add Account</p>
          </a>
        </li>


      </ul>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far	far fa-edit nav-icon"></i>
        <p>
          Edit
          <i class="fas fa-angle-left right nav-icon"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fas fa-user-alt nav-icon"></i>
            <p>Edit Client</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fas fa-id-card-alt nav-icon"></i>
            <p>Edit Account</p>
          </a>
        </li>

      </ul>
    </li>




    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far  	fa fa-search nav-icon"></i>
        <p>
          Search
          <i class="fas fa-angle-left right nav-icon"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fas fa-user-alt nav-icon"></i>
            <p>Find Client</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fas fa-id-card-alt nav-icon"></i>
            <p>Find Account</p>
          </a>
        </li>

      </ul>
    </li>




    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="fas fas fa-database nav-icon"></i>
        <p>
          Show
          <i class="fas fa-angle-left right nav-icon"></i>
        </p>
      </a>


      <ul class="nav nav-treeview">

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far  	fas fa-user-alt nav-icon"></i>
            <p>Clients</p>
          </a>
        </li>




        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far  	fas fa-id-card-alt nav-icon"></i>
            <p>Accounts</p>
          </a>
        </li>


      </ul>

    </li>

  </ul>
</li>
    
@endsection
