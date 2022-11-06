<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="{{ route('home') }}">
                <div class="logo-img mr-4">
                    <img height="45" src="{{ asset('images/logo.png') }}" class="header-brand-img" alt="site-logo"> 
                </div>
                <span class="text">Settings</span>
            </a>
            <!-- <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button> -->
        </div>
        
        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Navigation</div>
                    <div class="nav-item active">
                        <a href="{{ url('/') }}"><i class="ik ik-home"></i><span>Landing Page</span></a>
                    </div>
                    <div class="nav-item active">
                        <a href="{{ route('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>
                    @if(auth()->check() && auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Department Options</span></a>
                        <div class="submenu-content">
                            <a href="{{ route('department.index') }}" class="menu-item">All Departments</a>
                            <a href="{{ route('department.create') }}" class="menu-item">Add Department</a>
                        </div>
                    </div>
                    @endif
                    @if(auth()->check() && auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Users</span></a>
                        <div class="submenu-content">
                            <a href="{{ route('doctor.index') }}" class="menu-item">All Users</a>
                            <a href="{{ route('doctor.create') }}" class="menu-item">Add User</a>
                        </div>
                    </div>
                    @endif
                    @if(auth()->check() && auth()->user()->role->name === 'doctor')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-calendar"></i><span>Appointments</span></a>
                        <div class="submenu-content">
                            <a href="{{ route('appointment.create') }}" class="menu-item">Set Appointment</a>
                            <a href="{{ route('appointment.index') }}" class="menu-item">Search Available Date/Time</a>
                        </div>
                    </div>
                    @endif
                    @if(auth()->check() && auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-calendar"></i><span>Preview Appointments</span></a>
                        <div class="submenu-content">
                            <a href="{{ route('patient') }}" class="menu-item">Today's Appointments</a>
                            <a href="{{ route('all.appointments') }}" class="menu-item">All Appointments</a>
                        </div>
                    </div>
                    @endif
                    @if(auth()->check() && auth()->user()->role->name === 'doctor')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Patients</span></a>
                        <div class="submenu-content">
                            <a href="{{ route('patients.today') }}" class="menu-item">Patients (today)</a>
                            <a href="{{ route('prescribed.patients') }}" class="menu-item">All Patients(prescription)</a>
                            <!-- @if($global_today_booking)
                            <a href="{{ route('patients.today') }}" class="menu-item">Today's Visits  (Prescription)</a>
                            @endif -->
                        </div>
                    </div>
                    @endif
                    <div class="mt-3">
                    <a class="ml-4 text-white" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="ik ik-power dropdown-icon"></i>&nbsp;&nbsp; {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>