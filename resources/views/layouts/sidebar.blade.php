<main class="main-content">
    <div class="sidebar-wrapper">
        <div class="sidebar sidebar-collapse" id="sidebar">
            <div class="sidebar__menu-group">
                <ul class="sidebar_nav">
                    {{-- <li class="menu-title mt-30">
                        <span>Applications</span>
                    </li> --}}

                    <li>
                        <a href="{{ route('dashboard') }}" class>
                            <span class="nav-icon uil uil-chat"></span>
                            <span class="menu-text">Dashboard</span>

                        </a>
                    </li>

                    <li class="has-child">
                        <a href="#" class="has-child">
                            <span class="nav-icon uil uil-users-alt"></span>
                            <span class="menu-text">Status</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>

                            <li class>
                                <a href="{{ route('view.status')}}">View Status</a>
                            </li>
                            <li class>
                                <a href="{{ route('add.status') }}">Add Status</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="{{ route('add.cases') }}" class>
                            <span class="nav-icon uil uil-chat"></span>
                            <span class="menu-text">Cases</span>

                        </a>
                    </li>

                    {{-- <li>
                        <a href="{{ route('add.admin') }}" class>
                            <span class="nav-icon uil uil-chat"></span>
                            <span class="menu-text">Add Admin</span>

                        </a>
                    </li> --}}







                    <li class="has-child">
                        <a href="#" class="has-child">
                            <span class="nav-icon uil uil-users-alt"></span>
                            <span class="menu-text">Admin</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li class>
                                <a href="{{ route('view.admin') }}">View Admin</a>
                            </li>
                            <li class>
                                <a href="{{ route('add.admin')}}">Add Admin</a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-child">
                        <a href="#" class="has-child">
                            <span class="nav-icon uil uil-users-alt"></span>
                            <span class="menu-text">Customers</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li class>
                                <a href="{{ route('view.customer') }}">View Customers</a>
                            </li>
                            <li class>
                                <a href="{{ route('add.user')}}">Add Customers</a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-child">
                        <a href="#" class="has-child">
                            <span class="nav-icon uil uil-users-alt"></span>
                            <span class="menu-text">Employee</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li class>
                                <a href="{{ route('view.employee') }}">View Employee</a>
                            </li>
                            <li class>
                                <a href="{{ route('add.employee')}}">Add Employee</a>
                            </li>
                        </ul>
                    </li>


                    <li class="has-child">
                        <a href="#" class="has-child">
                            <span class="nav-icon uil uil-envelope"></span>
                            <span class="menu-text">Email</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            {{-- <li class>
                                <a href="{{ route('view.email') }}">Emails </a>
                            </li> --}}
                            <li class>
                                <a href="{{ route('emails.index') }}">View Emails </a>
                            </li>
                            <li class>
                                <a href="{{ route('emails.create') }}">Add Emails </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>
