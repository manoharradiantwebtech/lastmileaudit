<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#1c1c1c">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Last Mile Audit : Client Dashboard</title>
    <meta name="author" content="">
    <meta name="generator" content="">
    <link rel="canonical" href="">
    <!-- GOOGLE FONTS FOR SITE TEXT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <!-- FONTAWESOME v6.2.1 -->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <!-- BOOTSTRAP v5.3.0 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- MAIN STYLES -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
</head>
<body>
    <div class="main-wrapper" id="app">
        <header class="admin-header">
            <div class="admin-header-left">
                <a class="header-logo" href="{{ route('home')}}"><img src="{{asset('images/logo.png')}}" alt=""></a>
            </div>
            <div class="admin-header-right d-flex align-items-center">
                <div class="finyrselect d-flex flex-row align-items-center">
                    <span class="flex-shrink-0 pe-2">FY Selected:</span>
                    <select class="form-select form-select-sm " aria-label="Financial Year">
                        <option value="2023-2024" selected>2023-2024</option>
                        <option value="2022-2023">2022-2023</option>
                        <option value="2021-2022">2021-2022</option>
                        <option value="2020-2021">2020-2021</option>
                        <option value="2019-2020">2019-2020</option>
                    </select>
                </div>
                <a class="header-notification" href="javascript:void(0);"> <small></small> <i class="fa-regular fa-bell"></i> </a>
                <div class="header-brand"> <a class="brand-logo" href="javascript:void(0);"> <img class="img-fluid" src="{{asset('images/brand.png')}}" alt=""></a> </div>
                <div class="dropdown d-inline-block">
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center" href="javascript:void(0);" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Hi Ankit </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.html"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="change-password.html"><i class="fa fa-lock"></i> Change Password</a></li>
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <aside class="admin-sidebar">
            <ul class="admin-sidebar-links">
                <li class="active"><a href="{{ route('home')}}"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
                <li>
                    <a href="javascript:void(0);"><i class="list-icon fa-solid fa-user"></i> Master <i class="dd-caret fa-solid fa-caret-down"></i></a>
                    <ul class="inner-links">
                        <li><a href="{{ route('master.location.index')}}"><i class="fa-solid fa-location-dot"></i> Locations</a></li>
                        <li><a href="{{ route('master.sublocation.index')}}"><i class="fa-solid fa-map-location-dot"></i> Sublocation</a></li>
                        <li><a href="{{ route('master.department.index')}}"><i class="fa-solid fa-briefcase"></i> Department</a></li>
                        <li><a href="{{ route('master.user.index')}}"><i class="fa-solid fa-user-group"></i> Users</a></li>
                        <li><a href="{{ route('master.calender')}}"><i class="fa-solid fa-calendar"></i> Calendar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);"><i class="list-icon fa-solid fa-gear"></i> Setup <i class="dd-caret fa-solid fa-caret-down"></i></a>
                    <ul class="inner-links">
                        <li><a href="assign-audit.html"><i class="fa-solid fa-file-circle-check"></i> Assign Audits</a></li>
                        <li><a href="checklist.html"><i class="fa-solid fa-list-check"></i> Checklist</a></li>
                        <li><a href="{{route('setup.role.index')}}"><i class="fa-solid fa-user-check"></i> Role Management</a></li>
                    </ul>
                </li>
                <li><a href="analytics.html"><i class="fa-solid fa-flag"></i> Analytics </a></li>
                <li><a href="report.html"><i class="fa-solid fa-file-lines"></i> Reports</a></li>
                <li><a href="tickets.html"><i class="fa-solid fa-ticket"></i> Tickets</a></li>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                            </ul>
        </aside>

        <main class="main-content">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/index.global.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    
</body>
</html>
