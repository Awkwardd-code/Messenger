


<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="/messages" aria-expanded="true" aria-controls="auth">
                <i class="fas fa-comments menu-icon"></i>
                <span class="menu-title">Chat</span>
            </a>
        </li>
        @if($LoggedAdminInfo->super_admin == 1)
            <li class="nav-item">
                <a class="nav-link"  href="{{ route('superAdminDashboard') }}" aria-expanded="false" >
                    <i class="fas fa-dashboard menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a> 
            </li>
        @elseif($LoggedAdminInfo->super_admin == 0 && $LoggedAdminInfo->is_admin == 1)
            <li class="nav-item">
                <a class="nav-link"  href="{{ route('adminDashboard') }}" aria-expanded="false">
                    <i class="fas fa-dashboard menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a> 
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link"  href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="fas fa-dashboard menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a> 
            </li>
        @endif
        <!-- <li class="nav-item">
            <a class="nav-link" href="/messages" >
                <i class="fas fa-tachometer-alt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li> -->
        
        

        
        <!-- <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="true" aria-controls="auth">
        <i class="fas fa-comments menu-icon"></i>
        <span class="menu-title">Chat</span>
         </a>
    <div class="collapse show" id="auth">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/admin/chats">Chats</a></li>
        </ul>
    </div>
</li> -->

       <!-- #endregion -->
    </ul>
</nav>


