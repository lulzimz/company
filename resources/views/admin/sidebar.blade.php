<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">

        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="/dashboard">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>
                <span class="brand-name">Admin Dashboard</span>
            </a>
        </div>

        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">


                <li class="has-sub active expand">

                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Home</span> <b class="caret"></b>
                    </a>

                    <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('slider') }}">
                                    <span class="nav-text">Slider</span>
                                </a>
                            </li>

                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('home.about') }}">
                                    <span class="nav-text">Home About</span>
                                </a>
                            </li>

                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('multi.image') }}">
                                    <span class="nav-text">Home Multi Images</span>
                                </a>
                            </li>

                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('brand') }}">
                                    <span class="nav-text">Home Brand</span>
                                </a>
                            </li>
                        </div>
                    </ul>

                </li>



                <li class="has-sub">

                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-elements" aria-expanded="false" aria-controls="ui-elements">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">Contact Page</span> <b class="caret"></b>
                    </a>

                    <ul class="collapse" id="ui-elements" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('adminContact') }}">
                                    <span class="nav-text">Contact Profile </span>
                                </a>
                            </li>

                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('adminContactMessage') }}">
                                    <span class="nav-text">Contact Message</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>



                <li class="has-sub">

                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#about" aria-expanded="false" aria-controls="ui-elements">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">About Page</span> <b class="caret"></b>
                    </a>

                    <ul class="collapse" id="about" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('client') }}">
                                    <span class="nav-text">Clients </span>
                                </a>
                            </li>
                        </div>
                    </ul>

                </li>



                <li class="has-sub">

                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts" aria-expanded="false" aria-controls="charts">
                        <i class="mdi mdi-chart-pie"></i>
                        <span class="nav-text">Charts</span> <b class="caret"></b>
                    </a>

                    <ul class="collapse" id="charts" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="chartjs.html">
                                    <span class="nav-text">ChartJS</span>
                                </a>
                            </li>
                        </div>
                    </ul>

                </li>



                <li class="has-sub">

                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#documentation" aria-expanded="false" aria-controls="documentation">
                        <i class="mdi mdi-book-open-page-variant"></i>
                        <span class="nav-text">Documentation</span> <b class="caret"></b>
                    </a>

                    <ul class="collapse" id="documentation" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li class="section-title">
                                Getting Started
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="introduction.html">
                                    <span class="nav-text">Introduction</span>
                                </a>
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="setup.html">
                                    <span class="nav-text">Setup</span>
                                </a>
                            </li>

                        </div>
                    </ul>

                </li>

            </ul>

        </div>

        <hr class="separator" />

    </div>
</aside>