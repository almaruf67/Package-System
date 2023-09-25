<!DOCTYPE html>
<html lang="en" class="minimal-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{ asset('admin/images/favicon-32x32.png') }} " type="image/png" />
    <!--plugins-->
    <link href="{{ asset('admin/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- loader-->
    <link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="{{ asset('admin/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/header-colors.css') }}" rel="stylesheet" />

    <title>Manager Panel</title>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand">
                <div class="mobile-toggle-icon d-xl-none">
                    <i class="bi bi-list"></i>
                </div>
                <div class="top-navbar d-none d-xl-block">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('panel') }}">home</a>
                        </li>
                    </ul>
                </div>
                <div class="search-toggle-icon d-xl-none ms-auto">
                    <i class="bi bi-search"></i>
                </div>
                <form class="searchbar d-none d-xl-flex ms-auto">
                    <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
                        <i class="bi bi-search"></i>
                    </div>
                    <input class="form-control" type="text" placeholder="Type here to search" />
                    <div class="position-absolute top-50 translate-middle-y d-block d-xl-none search-close-icon">
                        <i class="bi bi-x-lg"></i>
                    </div>
                </form>
                <div class="top-navbar-right ms-3">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown">
                                <div class="user-setting d-flex align-items-center gap-1">
                                    <img src="{{ asset("admin/images/avatars/avatar-1.png") }}" class="user-img" alt="" />
                                    <div class="user-name d-none d-sm-block">{{ Auth::user()->name }}</div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset("admin/images/avatars/avatar-1.png") }}" alt=""
                                                class="rounded-circle" width="60" height="60" />
                                            <div class="ms-3">
                                                <h6 class="mb-0 dropdown-user-name">{{ Auth::user()->name }}</h6>
                                                <small class="mb-0 dropdown-user-designation text-secondary">HR
                                                    Manager</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-user-profile.html">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon">
                                                <i class="bi bi-person-fill"></i>
                                            </div>
                                            <div class="setting-text ms-3">
                                                <span>Profile</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon">
                                                <i class="bi bi-gear-fill"></i>
                                            </div>
                                            <div class="setting-text ms-3">
                                                <span>Setting</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index2.html">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon">
                                                <i class="bi bi-speedometer"></i>
                                            </div>
                                            <div class="setting-text ms-3">
                                                <span>Dashboard</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon">
                                                <i class="bi bi-piggy-bank-fill"></i>
                                            </div>
                                            <div class="setting-text ms-3">
                                                <span>Earnings</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon">
                                                <i class="bi bi-lock-fill"></i>
                                            </div>
                                            <div class="setting-text ms-3"><span>Logout</span></div>
                                        </div>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->

        @include('manager.layouts.sidebar')

        {{-- <div class="content-wrapper"> --}}
            <!--to control child(admin-template)-->
             @yield('content')
         {{-- </div> --}}

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>
        <!--End Back To Top Button-->

        
    </div>
    <!--end wrapper-->

    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/js/pace.min.js') }}"></script>
    <!--app-->
    <script src="{{ asset('admin/js/app.js') }}"></script>
    @yield('script')
</body>

</html>
