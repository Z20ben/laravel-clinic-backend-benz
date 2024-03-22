<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <i class="fa-solid fa-house-chimney-medical"></i>
                Medical Klinik</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Mk</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Master Data</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master Data</span></a>
                {{-- <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                </ul> --}}
                <ul class="dropdown-menu">

                </ul>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('users.index') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('users.index') }}">
                            <i class="fa-solid fa-user"></i>
                            <span> Users</span></a>
                    </li>
                    <li class=''{{ Request::is('doctors.index') ? 'active' : '' }}''>
                        <a class="nav-link"
                            href="{{ route('doctors.index') }}">
                            <i class="fa-solid fa-stethoscope"></i>
                            <span>Doctors</span>
                            </a>
                    </li>
                    {{-- <li class=''{{ Request::is('doctor-schedules.index') ? 'active' : '' }}''>
                        <a class="nav-link"
                            href="{{ route('doctor-schedules.index') }}">
                            <i class="fa-solid fa-stethoscope"></i>
                            <span>Doctors Schedule</span>
                            </a>
                    </li> --}}
                </ul>
            </li>
            <li class=''>
                <a class="nav-link" href="{{ route('doctor-schedules.index') }}"><i class="fas fa-fire"></i>Doctor Schedules</a>
            </li>
            <li class=''>
                <a class="nav-link" href="{{ route('patients.index') }}"><i class="fas fa-fire"></i>Patients</a>
            </li>

        </ul>

    </aside>
</div>
