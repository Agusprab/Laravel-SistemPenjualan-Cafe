    <!-- HEADER DESKTOP-->
    {{-- <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                    
                    </form>
                    <div class="header-button">
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                 
                                <div class="content">
                                    <i class="fa fa-user" aria-hidden="true"></i> <a class="js-acc-btn" href="#">{{ Auth::guard('pegawai')->user()->name}}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                              
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                               <a class="js-acc-btn" href="#">{{ Auth::guard('pegawai')->user()->name}}</a>
                                            </h5>
                                            <span class="email">{{ Auth::guard('pegawai')->user()->email}}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="{{ url('/logout')}}">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header> --}}
    <!-- END HEADER DESKTOP-->
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{asset('images/icon/logo.png')}}" alt="CoolAdmin" />
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
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('images/icon/logo.png')}}" alt="Cool Admin" />
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
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap ">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu d-none">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu d-none">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu d-none">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                      
                                        </div>
                                        <div class="content">
                                           <i class="fa fa-user" aria-hidden="true"></i> <a class="js-acc-btn" href="#">{{ Auth::guard('pegawai')->user()->name}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                      
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ Auth::guard('pegawai')->user()->name}}</a>
                                                    </h5>
                                                    <span class="email">{{ Auth::guard('pegawai')->user()->email}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ url('/admin/account')}}">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
            
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ url('/logout')}}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>