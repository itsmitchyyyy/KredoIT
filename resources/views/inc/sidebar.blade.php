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
                    @if (Auth::user()->user_type == 'MANAGER' || Auth::user()->user_type == 'ADMIN')
                    <li class="{{ Request::is('dashboard') ? ' active' : '' }}">
                        <a href="{{ route('borrowed.reports') }}">
                            <i class="fa fa-tachometer-alt"></i>
                           Dashboard
                        </a>
                    </li>
                    @endif
                    <li class="{{ Request::is('notification') ? ' active' : '' }}">
                        <a href="{{ route('notification.index') }}">
                            <i class="fas fa-bell"></i>Notifications</a>
                    </li>
                    <li class="{{ Request::is('item') ? ' active' : '' }}">
                        <a href="{{ route('item.index') }}">
                            <i class="fas fa-shopping-cart"></i>Items</a>
                    </li>
                    @if (Auth::user()->user_type == 'EMPLOYEE' || Auth::user()->user_type == 'MANAGER')
                        <li class="{{ Request::is('borrowed') ? ' active' : '' }}">
                            <a href="{{ route('borrowed.index') }}">
                            <i class="far fa-envelope"></i>Borrowed Items</a>
                        </li>
                    @endif
                    @if (Auth::user()->user_type == 'MANAGER' || Auth::user()->user_type == 'ADMIN')
                        <li class="{{ Request::is('request') ? ' active' : '' }}">
                            <a href="{{ route('request.index') }}">
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