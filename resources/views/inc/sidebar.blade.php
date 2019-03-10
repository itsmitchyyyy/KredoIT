<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="#">
                <span>Kredo IT Abroad. Inc.</span>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="{{ Request::is('home') ? ' active' : '' }}">
                        <a href="chart.html">
                            <i class="fas fa-bell"></i>Notifications</a>
                    </li>
                    <li>
                        <a href="table.html">
                            <i class="fas fa-tachometer-alt"></i>Items</a>
                    </li>
                    @if (Auth::user()->user_type == 'EMPLOYEE')
                        <li>
                            <a href="form.html">
                            <i class="far fa-envelope"></i>Borrowed Items</a>
                        </li>
                    @endif
                    @if (Auth::user()->user_type == 'MANAGER' || Auth::user()->user_type == 'ADMIN')
                        <li>
                            <a href="form.html">
                            <i class="far fa-envelope"></i>Request Items</a>
                        </li>
                    @endif
                    @if (Auth::user()->user_type == 'ADMIN')
                        <li class="{{ Request::is('account') ? ' active': '' }}">
                            <a href="{{ route('account.index') }}">
                                <i class="fas fa-users"></i>Create Account</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->