                <!-- HEADER MOBILE-->
                {{-- <header class="header-mobile d-block d-lg-none">
                    <div class="header-mobile__bar">
                        <div class="container-fluid">
                            <div class="header-mobile-inner">
                                <a class="logo" href="index.html">
                                    <img src="{{ asset('images/icon/logo.png')}}" alt="CoolAdmin" />
                                </a>
                                <button class="hamburger hamburger--slider" type="button">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar-mobile">
                        <div class="container-fluid">
                            <ul class="navbar-mobile__list list-unstyled">
                                <li class="{{ ($title === 'Dashboard Admin') ? 'active' : ''}} has-sub">
                                    <a class="js-arrow" href="{{ url('/admin')}}">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>                        
                                </li>
                                <li>
                                    <a href="{{ url('/admin/manageuser')}}">
                                        <i class="fas fa-chart-bar"></i>Manage Users</a>
                                </li>
                                <li class="has-sub">
                                    <a href="#">
                                        <i class="fa fa-cube" aria-hidden="true"></i>Item</a>
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        <li>
                                            <a href="{{ url('/admin/listitem')}}">List  Item</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/admin/listsupplier')}}">List Supplier</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/admin/incomeitems')}}">Barang Masuk </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/admin/solditems')}}">Barang Terjual </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/admin/stokitem')}}">Stok Barang </a>
                                        </li>
                                        <li>
                                            <a href="forget-pass.html">Forget Password</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="form.html">
                                        <i class="far fa-check-square"></i>Forms</a>
                                </li>
                                <li>
                                    <a href="calendar.html">
                                        <i class="fas fa-calendar-alt"></i>Calendar</a>
                                </li>
                                <li>
                                    <a href="map.html">
                                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                                </li>
                                
                                <li class="has-sub">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-desktop"></i>UI Elements</a>
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        <li>
                                            <a href="button.html">Button</a>
                                        </li>
                                        <li>
                                            <a href="badge.html">Badges</a>
                                        </li>
                                        <li>
                                            <a href="tab.html">Tabs</a>
                                        </li>
                                        <li>
                                            <a href="card.html">Cards</a>
                                        </li>
                                        <li>
                                            <a href="alert.html">Alerts</a>
                                        </li>
                                        <li>
                                            <a href="progress-bar.html">Progress Bars</a>
                                        </li>
                                        <li>
                                            <a href="modal.html">Modals</a>
                                        </li>
                                        <li>
                                            <a href="switch.html">Switchs</a>
                                        </li>
                                        <li>
                                            <a href="grid.html">Grids</a>
                                        </li>
                                        <li>
                                            <a href="fontawesome.html">Fontawesome Icon</a>
                                        </li>
                                        <li>
                                            <a href="typo.html">Typography</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header> --}}
                <!-- END HEADER MOBILE-->
        
        <!-- MENU SIDEBAR-->
        {{-- <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="{{ ($title === 'Dashboard Admin') ? 'active' : ''}}">
                            <a class="js-arrow" href="{{ url('/admin')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>                        
                        </li>
                     @if (Auth::guard('pegawai')->user()->role === 'admin')
                     <li class="{{ ($title === 'Manage Users') ? 'active' : ''}}">
                        <a href="{{ url('/admin/manageuser')}}">
                            <i class="fas fa-chart-bar"></i>Manage Users</a>
                           
                    </li>
                     @endif
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-cube" aria-hidden="true"></i>Item</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ url('/admin/listitem')}}">List  Item</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/listsupplier')}}">List Supplier</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/incomeitems')}}">Barang Masuk </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/solditems')}}">Barang Terjual </a>
                                </li>                                
                                <li>
                                    <a href="{{ url('/admin/stokitem')}}">Stok Barang </a>
                                </li>
                            </ul>
                        </li>                       
                       
                    </ul>
                </nav>
            </div>
        </aside> --}}
        <!-- END MENU SIDEBAR-->