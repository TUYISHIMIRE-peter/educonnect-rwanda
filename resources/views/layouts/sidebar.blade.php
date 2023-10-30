<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/{{ Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ ucfirst(Auth::user()->name) }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-header">NAVIGATION</li>
                <li class="nav-item">
                    <a href="/callendar" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('school.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Schools
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/chatify" class="nav-link">
                        <i  class="fas fa-comment"></i>
                        <p>
                            Chat
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('post.create') }}" class="nav-link">
                        <i  class="fas fa-comment"></i>
                        <p>
                            Ask
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('posts') }}" class="nav-link">
                        <i  class="fas fa-comment"></i>
                        <p>
                            community
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('uploaded') }}" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            shared content
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('add_video') }}" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            share video content
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users') }}" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Manage Users
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
