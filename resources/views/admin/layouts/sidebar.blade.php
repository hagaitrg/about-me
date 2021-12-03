<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img src="{{ asset('img/icons/Hagai_Padoru.png') }}" height="45" width="58">
        <a href="{{route('admin-home')}}"><strong>Hagaitrg</strong></a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item">
            <a href="{{route('admin-home')}}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Main Content</li>
        <li class="nav-item">
            <a href="{{route('admin-about')}}" class="nav-link"><i class="fas fa-address-card"></i><span>About Me</span></a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin-skill')}}" class="nav-link"><i class="fas fa-code"></i><span>Skills</span></a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin-project')}}" class="nav-link"><i class="fas fa-tasks"></i><span>Projects</span></a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="fas fa-inbox"></i><span>Message</span></a>
        </li>
    </ul>
</aside>