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
                    <!-- Dropdown Toggle Link -->
                    @php
                        // --- UPDATED: 'new-order-pages.*' add karein ---
                        $contentRoutes = ['splash-screens.*', 'select-city-pages.*', 'phone-number-pages.*', 'otp-pages.*',
                         'home-page-contents.*', 'new-order-pages.*', 'order-customization-pages.*', 'cart-page-contents.*',
                            'checkout-page-contents.*', 'add-address-pages.*', 'access-location-pages.*', 'profile-pages.*',
                            'card-details-pages.*', 'successful-pages.*'];
                    @endphp
                    <a class="nav-link d-flex align-items-center {{ request()->routeIs($contentRoutes) ? 'active' : '' }}" 
                       href="#sidebarContent" 
                       data-bs-toggle="collapse" 
                       role="button" 
                       aria-expanded="{{ request()->routeIs($contentRoutes) ? 'true' : 'false' }}">
                        
                        <i data-feather="edit" class="me-2" style="width: 18px;"></i>
                        <span> Dynamic Content </span>

                        <span class="menu-arrow ms-auto"><i data-feather="chevron-right" style="width: 16px;"></i></span>
                    </a>

                    <!-- Collapsible Sub-menu -->
                    <div class="collapse {{ request()->routeIs($contentRoutes) ? 'show' : '' }}" id="sidebarContent">
                        <ul class="nav flex-column ps-4">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('splash-screens.*') ? 'active' : '' }}" 
                                   href="{{ route('splash-screens.index') }}">
                                    <span>Splash Screen</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('select-city-pages.*') ? 'active' : '' }}" 
                                   href="{{ route('select-city-pages.index') }}">
                                    <span>Select City Page</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('phone-number-pages.*') ? 'active' : '' }}" 
                                   href="{{ route('phone-number-pages.index') }}">
                                    <span>Phone Number Page</span>
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('otp-pages.*') ? 'active' : '' }}" 
                                   href="{{ route('otp-pages.index') }}">
                                    <span>OTP Page</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('profile-pages.*') ? 'active' : '' }}" 
                                   href="{{ route('profile-pages.index') }}">
                                    <span>Profile Page</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('home-page-contents.*') ? 'active' : '' }}" 
                                   href="{{ route('home-page-contents.index') }}">
                                    <span>Home Page</span>
                                </a>
                            </li>
                            <!-- --- NEW: New Order Page Link --- -->
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('new-order-pages.*') ? 'active' : '' }}" 
                                   href="{{ route('new-order-pages.index') }}">
                                    <span>New Order Page</span>
                                </a>
                            </li>
                             <!-- --- NEW: Order Customization Page Link --- -->
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('order-customization-pages.*') ? 'active' : '' }}" 
                                   href="{{ route('order-customization-pages.index') }}">
                                    <span>Order Customization Page</span>
                                </a>
                            </li>
                             <!-- --- NEW: Cart Page Link --- -->
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('cart-page-contents.*') ? 'active' : '' }}" 
                                   href="{{ route('cart-page-contents.index') }}">
                                    <span>Cart Page</span>
                                </a>
                            </li>
                             <!-- --- NEW: Checkout Page Link --- -->
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('checkout-page-contents.*') ? 'active' : '' }}" 
                                   href="{{ route('checkout-page-contents.index') }}">
                                    <span>Checkout Page</span>
                                </a>
                            </li>
                             <!-- --- NEW: Add Address Page Link --- -->
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('add-address-pages.*') ? 'active' : '' }}" 
                                   href="{{ route('add-address-pages.index') }}">
                                    <span>Add Address Page</span>
                                </a>
                            </li>
                             <!-- --- NEW: Access Location Page Link --- -->
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('access-location-pages.*') ? 'active' : '' }}" 
                                   href="{{ route('access-location-pages.index') }}">
                                    <span>Access Location Page</span>
                                </a>
                            </li>
                             <!-- --- NEW: Card Details Page Link --- -->
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('card-details-pages.*') ? 'active' : '' }}" 
                                   href="{{ route('card-details-pages.index') }}">
                                    <span>Card Details Page</span>
                                </a>
                            </li>
                             <!-- --- NEW: Successful Page Link --- -->
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('successful-pages.*') ? 'active' : '' }}" 
                                   href="{{ route('successful-pages.index') }}">
                                    <span>Successful Page</span>
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