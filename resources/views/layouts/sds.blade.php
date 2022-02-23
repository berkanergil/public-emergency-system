 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ route('statistics') }}" class="brand-link">
         <img src="{{ asset('images/emergencyp-white.png') }}" alt="EmergenCYP Logo" class="brand-image img-circle">
         <span class=" brand-text font-weight-light">
             <p style="font-size: 15px;"> EmergenCyp</p>
         </span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex text-center justify-content-center align-items-center">
             <div class="info">
                 {{-- <a href="#" class="d-block">{{ Auth::user()->name }}</a> --}}
                 <a href="{{ route('profile', $staff) }}" class="d-block"><i class="fas fa-user-circle"></i>
                     {{ Str::title($name . ' ' . $surname) }}</a>
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
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-header"> <strong> STATISTICS & INSIGHTS</strong></li>

                 <li class="nav-item menu-open">
                     <a href="{{ route('statistics') }}" class=" nav-link active">
                         <i class="ml-1 fas fa-chart-line"></i>
                         <p class="ml-1">
                             Statistics & Insights
                         </p>
                     </a>

                 </li>
                 <li class="nav-header"> <strong> EVENT OPERATIONS</strong></li>
                 <li class="nav-item">
                     <a href="{{ route('newReports', ['id' => $staff->id]) }}" class="nav-link">
                         <i class="ml-1 fas fa-search-location"></i>
                         <p class="ml-1">
                             New Reports
                             <span class="right badge badge-danger ml-1">Live Map</span>
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="ml-1 fas fa-folder-open"></i>
                         <p class="ml-1">
                             Report Archive
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('currentReports') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Current Reports</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('pastReports') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Past Reports</p>
                             </a>
                         </li>

                     </ul>
                 </li>

                 <li class="nav-header"><strong>USER OPERATIONS</strong></li>
                 @if ($role == '3')
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="ml-1 fas fa-user-tie"></i>
                             <p class="ml-2">
                                 Authorities
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="{{ route('createAuthority') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Create Authorities </p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('authorities') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>All Authorites</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                 @endif
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="ml-1 fas fa-user-tie"></i>
                         <p class="ml-2">
                             Agents
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('deployAgentGroups') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create Agent Groups</p>
                             </a>
                         </li>
                         @if ($role == '3')
                             <li class="nav-item">
                                 <a href="{{ route('createAgents') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Create Agents</p>
                                 </a>
                             </li>
                         @endif
                         <li class="nav-item">
                             <a href="{{ route('agentGroups') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Agent Groups</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('agents') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>All Agents</p>
                             </a>
                         </li>


                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="ml-1 fas fa-user"></i>
                         <p class="ml-2">
                             Users
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('users') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>All Users</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-header"><strong>SYSTEM OPERATIONS</strong></li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="ml-1 fas fa-envelope"></i>
                         <p class="ml-2">
                             SMS Messages
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>

                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('createMessages') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create SMS Messages</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('messages') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>See All SMS Messages</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="ml-1 fas fa-bell"></i>
                         <p class="ml-2">
                             Notifications
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>

                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('createNotifications') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create Notifications</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('notifications') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>See All Notifications</p>
                             </a>
                         </li>
                     </ul>
                 </li>


                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="ml-1 fas fa-database"></i>
                         <p class="ml-2">
                             Databases
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>

                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Modify Databases</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Archive Databases</p>
                             </a>
                         </li>
                     </ul>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
