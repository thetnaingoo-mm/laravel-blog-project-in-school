<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="flex-fill"></div>
    <div class="navbar nav">
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a href="#" class="dropdown-item">User Profile</a></li>
                <li><a href="#" class="dropdown-item"> {{ Auth::user()->name }}</a></li>
                
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-cog"></i>
            </a>
        </li>
    </div>
</nav>
