<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('stocks') }}">
                <i class="mdi mdi-store menu-icon"></i>
                <span class="menu-title">Stocks</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('sales') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Sales</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('report') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Reports</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('settings') }}">
                <i class="mdi mdi-emoticon menu-icon"></i>
                <span class="menu-title">Settings</span>
            </a>
        </li>
    </ul>
</nav>
