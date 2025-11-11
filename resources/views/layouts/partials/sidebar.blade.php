<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
    <!-- Logo Box -->
    <div class="logo-box p-3">
        <a href="{{ route('home') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="/images/logo-sm.png" alt="Small Logo" height="22">
            </span>
            <span class="logo-lg">
                <img src="/images/logo-light.png" alt="Large Logo" height="24">
            </span>
        </a>
        <a href="{{ route('home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="/images/logo-sm.png" alt="Small Logo" height="22">
            </span>
            <span class="logo-lg">
                <img src="/images/logo-dark.png" alt="Large Logo" height="24">
            </span>
        </a>
    </div>

    <!-- Sidebar Menu -->
    <div class="h-100" data-simplebar>
        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <!-- Custom styling for sidebar buttons -->
            <style>
                /* Main sidebar pill buttons */
                #side-menu.nav-pills .nav-link {
                    padding-top: 0.8rem;
                    padding-bottom: 0.8rem;
                    border-radius: 0.375rem;
                    font-weight: 500;
                    color: #495057;
                    transition: all 0.2s ease-in-out;
                }

                /* Hover effect for non-active buttons */
                #side-menu.nav-pills .nav-link:not(.active):hover {
                    background-color: #e9ecef;
                }

                /* Active button style */
                #side-menu.nav-pills .nav-link.active {
                    background-color: #0d6efd;
                    color: #fff;
                    box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
                }

                /* Sub-menu links */
                #side-menu .nav-second-level .nav-link {
                    padding-top: 0.6rem;
                    padding-bottom: 0.6rem;
                    font-weight: normal;
                }

                /* Active sub-menu link */
                #side-menu .nav-second-level .nav-link.active {
                    background-color: transparent;
                    color: #0d6efd;
                    font-weight: 500;
                    box-shadow: none;
                }

                /* Hover sub-menu link */
                #side-menu .nav-second-level .nav-link:not(.active):hover {
                    background-color: #f8f9fa;
                    color: #000;
                }

                /* Arrow animation */
                .menu-arrow {
                    transition: transform 0.2s ease;
                }

                a[aria-expanded="true"] .menu-arrow {
                    transform: rotate(90deg);
                }
            </style>

            <ul class="nav flex-column nav-pills px-3" id="side-menu">

                <!-- Menu Title -->
                <li class="nav-item">
                    <h6 class="nav-link text-muted text-uppercase small mt-2 mb-1">Menu</h6>
                </li>

                <!-- Dashboard Link -->
                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center {{ request()->routeIs('home') ? 'active' : '' }}" 
                       href="{{ route('home') }}">
                        <i data-feather="home" class="me-2" style="width: 18px;"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <!-- Pages Title -->
                <li class="nav-item">
                    <h6 class="nav-link text-muted text-uppercase small mt-3 mb-1">Pages</h6>
                </li>

                <!-- Profile Link -->
                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center {{ request()->routeIs('profile') ? 'active' : '' }}" 
                       href="{{ route('profile') }}">
                        <i data-feather="file-text" class="me-2" style="width: 18px;"></i>
                        <span> Profile </span>
                    </a>
                </li>

                <!-- Category Link -->
                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center {{ request()->routeIs('categories.*') ? 'active' : '' }}" 
                       href="{{ route('categories.index') }}">
                        <i data-feather="grid" class="me-2" style="width: 18px;"></i>
                        <span> Categories </span>
                    </a>
                </li>

                <!-- Items Link -->
                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center {{ request()->routeIs('items.*') ? 'active' : '' }}" 
                       href="{{ route('items.index') }}">
                        <i data-feather="box" class="me-2" style="width: 18px;"></i>
                        <span> Items </span>
                    </a>
                </li>

                <!-- ==== DYNAMIC CONTENT DROPDOWN (FIXED UI) ==== -->
                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center {{ request()->routeIs('splash-screens.*') ? 'active' : '' }}"
                       href="#sidebarContent"
                       data-bs-toggle="collapse"
                       role="button"
                       aria-expanded="{{ request()->routeIs('splash-screens.*') ? 'true' : 'false' }}">
                        <i data-feather="edit" class="me-2" style="width: 18px;"></i>
                        <span> Dynamic Content </span>
                        <span class="menu-arrow ms-auto">
                            <i data-feather="chevron-right" style="width: 16px;"></i>
                        </span>
                    </a>

                    <!-- Sub-menu -->
                    <div class="collapse {{ request()->routeIs('splash-screens.*') ? 'show' : '' }}" id="sidebarContent">
                        <ul class="nav flex-column ps-4 nav-second-level">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('splash-screens.*') ? 'active' : '' }}"
                                   href="{{ route('splash-screens.index') }}">
                                    <span>Splash Screen</span>
                                </a>
                            </li>

                            <!-- --- NEW: Select City Page Link --- -->
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('select-city-pages.*') ? 'active' : '' }}" 
                                   href="{{ route('select-city-pages.index') }}">
                                    <span>Select City Page</span>
                                </a>
                            </li> 

                            <!-- --- NEW: Phone Number Page Link --- -->
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('phone-number-pages.*') ? 'active' : '' }}" 
                                   href="{{ route('phone-number-pages.index') }}">
                                    <span>Phone Number Page</span>
                                </a>
                            </li> 
                            
                            <!-- --- NEW: OTP Page Link --- -->
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('otp-pages.*') ? 'active' : '' }}" 
                                   href="{{ route('otp-pages.index') }}">
                                    <span>OTP Page</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                <!-- ==== END DYNAMIC CONTENT ==== -->

                <!-- User Management Dropdown (Spatie Permission Check) -->
                @can('user_management')
                <li class="nav-item my-1">
                    <a class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('user-management.*', 'role-management.*') ? 'active' : '' }}" 
                       href="#sidebarUserMgmt" 
                       data-bs-toggle="collapse" 
                       role="button" 
                       aria-expanded="{{ request()->routeIs('user-management.*', 'role-management.*') ? 'true' : 'false' }}">
                        <div class="d-flex align-items-center">
                            <i data-feather="users" class="me-2" style="width: 18px;"></i>
                            <span> User Management </span>
                        </div>
                        <span class="menu-arrow"></span>
                    </a>

                    <div class="collapse {{ request()->routeIs('user-management.*', 'role-management.*') ? 'show' : '' }}" id="sidebarUserMgmt">
                        <ul class="nav flex-column ps-4 nav-second-level">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('user-management.index') ? 'active' : '' }}" 
                                   href="{{ route('user-management.index') }}">
                                   <span>Users List</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('role-management.index') ? 'active' : '' }}" 
                                   href="{{ route('role-management.index') }}">
                                   <span>Roles</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan

            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->