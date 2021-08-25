{{-- ################################### --}}
{{-- this is sidebar for admin Home page --}}
{{-- ################################### --}}
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
      <a href="{{ route('register') }}" class="nav-link">
        <i class=" fas fa-user-plus"></i>
        <p>Create New user</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('user.search') }}" class="nav-link">
        <i class="far fas fa-user-cog"></i>
        <p>Show/Edit User</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('user.index') }}" class="nav-link">
        <i class="far fas fa-users"></i>
        <p>show All Users</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-cog"></i>
    <p>
     Workspaces (settings)
      <i class="fas fa-angle-left right"></i>
      <span class="badge badge-info right"></span>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('workspace.create') }}" class="nav-link">
        <i class="far fa fa-plus-square"></i>
        <p>Create New Workspace</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far fas fa-users"></i>
        <p>show/edit Workspace</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('workspace.index') }}" class="nav-link">
        <i class="far fas fa-layer-group"></i>
        <p>Show All workspaces</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-clipboard-list"></i>
    <p>
     Projects
      <i class="fas fa-angle-left right"></i>
      <span class="badge badge-info right"></span>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('projcet.create') }}" class="nav-link">
        <i class="far fa fa-plus-square"></i>
        <p>Create New Project</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far fas fa-users"></i>
        <p>show/edit Project</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('projcet.index') }}" class="nav-link">
        <i class="far  	fas fa-layer-group"></i>
        <p>Show All Project</p>
      </a>
    </li>
  </ul>
</li>

{{-- show all workspace in the system  for admin dashboard --}}
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-layer-group"></i>
    <p>
      Workspaces
      <i class="fas fa-angle-left right"></i>
      <span class="badge badge-info right"></span>
    </p>
  </a>
  @if(isset($workspaces) && $workspaces->count()>0 )
  @foreach ($workspaces as $workspace)
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far fa fa-plus-square"></i>
        <p>{{ $workspace->name }}</p>
      </a>
    </li>
  </ul>
  @endforeach
  @endif
</li>
