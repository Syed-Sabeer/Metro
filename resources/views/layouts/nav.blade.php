<body class="layout-light side-menu">
    <div class="mobile-search">
        <form action="/" class="search-form">
            <img src="img/svg/search.svg" alt="search" class="svg">
            <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..."
                aria-label="Search">
        </form>
    </div>
    <div class="mobile-author-actions"></div>
    <header class="header-top">
        <nav class="navbar navbar-light">
            <div class="navbar-left">
                <div class="logo-area">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img class="dark" src="{{ asset('img/logo-dark.jpg') }}" alt="logo">
                        <img class="light" src="{{ asset('img/logo-white.png') }}" alt="logo">
                    </a>
                    <a href="#" class="sidebar-toggle">
                        <img class="svg" src="{{ asset('img/svg/align-center-alt.svg') }}" alt="img"></a>
                </div>

            </div>

            <div class="navbar-right">
                <ul class="navbar-right__menu">

                    <li class="nav-message">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle icon-active">
                                <img class="svg" src="{{ asset('img/svg/message.svg') }}" alt="img">
                            </a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper">
                                    <h2 class="dropdown-wrapper__title">Messages <span
                                            class="badge-circle badge-success ms-1">2</span></h2>
                                    <ul>
                                        <li class="author-online has-new-message">
                                            <div class="user-avater">
                                                <img src="{{ asset('img/team-1.png') }}" alt>
                                            </div>
                                            <div class="user-message">
                                                <p>
                                                    <a href class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">Web Design</a>
                                                    <span class="time-posted">3 hrs ago</span>
                                                </p>
                                                <p>
                                                    <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                                        ipsum
                                                        dolor amet cosec Lorem ipsum</span>
                                                    <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="author-offline has-new-message">
                                            <div class="user-avater">
                                                <img src="img/team-1.png" alt>
                                            </div>
                                            <div class="user-message">
                                                <p>
                                                    <a href class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">Web Design</a>
                                                    <span class="time-posted">3 hrs ago</span>
                                                </p>
                                                <p>
                                                    <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                                        ipsum
                                                        dolor amet cosec Lorem ipsum</span>
                                                    <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="author-online has-new-message">
                                            <div class="user-avater">
                                                <img src="{{ asset('img/team-1.png') }}" alt>
                                            </div>
                                            <div class="user-message">
                                                <p>
                                                    <a href class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">Web Design</a>
                                                    <span class="time-posted">3 hrs ago</span>
                                                </p>
                                                <p>
                                                    <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                                        ipsum
                                                        dolor amet cosec Lorem ipsum</span>
                                                    <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="author-offline">
                                            <div class="user-avater">
                                                <img src="{{ asset('img/team-1.png') }}" alt>
                                            </div>
                                            <div class="user-message">
                                                <p>
                                                    <a href class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">Web Design</a>
                                                    <span class="time-posted">3 hrs ago</span>
                                                </p>
                                                <p>
                                                    <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                                        ipsum
                                                        dolor amet cosec Lorem ipsum</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="author-offline">
                                            <div class="user-avater">
                                                <img src="{{ asset('img/team-1.png') }}" alt>
                                            </div>
                                            <div class="user-message">
                                                <p>
                                                    <a href class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">Web Design</a>
                                                    <span class="time-posted">3 hrs ago</span>
                                                </p>
                                                <p>
                                                    <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                                        ipsum
                                                        dolor amet cosec Lorem ipsum</span>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href class="dropdown-wrapper__more">See All Message</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-notification">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle icon-active">
                                <img class="svg" src="{{ asset('img/svg/alarm.svg') }}" alt="img">
                            </a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper">
                                    <h2 class="dropdown-wrapper__title">Notifications <span
                                            class="badge-circle badge-warning ms-1">4</span></h2>
                                    <ul>
                                        <li
                                            class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                            <div class="nav-notification__type nav-notification__type--primary">
                                                <img class="svg" src="{{ asset('img/svg/inbox.svg') }}" alt="inbox">
                                            </div>
                                            <div class="nav-notification__details">
                                                <p>
                                                    <a href class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">James</a>
                                                    <span>sent you a message</span>
                                                </p>
                                                <p>
                                                    <span class="time-posted">5 hours ago</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li
                                            class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                            <div class="nav-notification__type nav-notification__type--secondary">
                                                <img class="svg" src="{{ asset('img/svg/upload.svg') }}" alt="upload">
                                            </div>
                                            <div class="nav-notification__details">
                                                <p>
                                                    <a href class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">James</a>
                                                    <span>sent you a message</span>
                                                </p>
                                                <p>
                                                    <span class="time-posted">5 hours ago</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li
                                            class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                            <div class="nav-notification__type nav-notification__type--success">
                                                <img class="svg" src="{{ asset('img/svg/log-in.svg') }}" alt="log-in">
                                            </div>
                                            <div class="nav-notification__details">
                                                <p>
                                                    <a href class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">James</a>
                                                    <span>sent you a message</span>
                                                </p>
                                                <p>
                                                    <span class="time-posted">5 hours ago</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                            <div class="nav-notification__type nav-notification__type--info">
                                                <img class="svg" src="{{ asset('img/svg/at-sign.svg') }}" alt="at-sign">
                                            </div>
                                            <div class="nav-notification__details">
                                                <p>
                                                    <a href class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">James</a>
                                                    <span>sent you a message</span>
                                                </p>
                                                <p>
                                                    <span class="time-posted">5 hours ago</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                            <div class="nav-notification__type nav-notification__type--danger">
                                                <img src="{{ asset('img/svg/heart.svg') }}" alt="heart" class="svg">
                                            </div>
                                            <div class="nav-notification__details">
                                                <p>
                                                    <a href class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">James</a>
                                                    <span>sent you a message</span>
                                                </p>
                                                <p>
                                                    <span class="time-posted">5 hours ago</span>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href class="dropdown-wrapper__more">See all incoming activity</a>
                                </div>
                            </div>
                        </div>
                    </li>




                    <li class="nav-author">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle">
                                {{-- <img src="{{ asset('img/author-nav.jpg') }}" alt class="rounded-circle"> --}}
                                <span class="nav-item__title">{{ Auth::user()->name; }}<i class="las la-angle-down nav-item__arrow"></i></span>
                            </a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper">
                                    <div class="nav-author__info">
                                        <div class="author-img">
                                          
                                        </div>
                                        <div>
                                            <h6>{{ Auth::user()->name; }}</h6>
                                            <span>UI Designer</span>
                                        </div>
                                    </div>
                                    <div class="nav-author__options">
                                        <ul>
                                            <li><a href="#"><i class="uil uil-user"></i> Profile</a></li>
                                            <li><a href="#"><i class="uil uil-setting"></i> Settings</a></li>
                                            <li><a href="#"><i class="uil uil-key-skeleton"></i> Billing</a></li>
                                            <li><a href="#"><i class="uil uil-users-alt"></i> Activity</a></li>
                                            <li><a href="#"><i class="uil uil-bell"></i> Help</a></li>
                                        </ul>


                                            <button type="submit" class="nav-author__signout">
                                                <i class="uil uil-sign-out-alt"></i> Sign Out
                                            </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>


                </ul>


            </div>

        </nav>
    </header>
