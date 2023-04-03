<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ProfileProject | @yield('page_title', 'No Title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminPanel/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('AdminPanel/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('AdminPanel/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('AdminPanel/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminPanel/dist/css/adminlte.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('AdminPanel/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('AdminPanel/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('AdminPanel/plugins/summernote/summernote-bs4.css') }}">
    <!-- Special Style -->
    <link rel="stylesheet" href="{{ asset('AdminPanel/dist/css/header_style.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Custom Style For Arabic -->
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('AdminPanel/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('AdminPanel/dist/css/custom_rtl.css') }}">
    @endif
    @yield('page_style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('sweetalert::alert')
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('dashboard') }}" class="nav-link">{{ __('app.Home') }}</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">{{ __('app.contact') }}</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="@lang('app.Search')"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="{{ asset('AdminPanel/dist/img/icons8-english-to-arabic-24.png') }}"
                            alt="English To Arabic" width="30px">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                class="dropdown-item {{ App::getLocale() == $localeCode ? 'active' : '' }}">
                                <!-- Message Start -->
                                <div class="media media_lang">
                                    <img src="{{ asset('AdminPanel/dist/img/' . $properties['name'] . '.jpg') }}"
                                        alt="User Avatar" class="img-size-50 mr-3 img-circle lang_circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            {{ $properties['native'] }}
                                            <span class="float-right text-sm text-danger">{{ $localeCode }}</span>
                                        </h3>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                        @endforeach
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="{{ asset('AdminPanel/dist/img/log_out.png') }}" alt="LOG OUT" width="30px">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button
                                class="dropdown-item dropdown-footer dropdown_logout">{{ __('app.LOG OUT') }}</button>
                        </form>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link">
                <img src="{{ asset('AdminPanel/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ trans('app.ProfileProject') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('uploads/users/' . Auth::user()->image) }}"
                            class="img-circle elevation-2 usr_imgOne" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block usr_name">@lang('app.Welcome'), {{ Auth::user()->name }}</a>
                        <small class="show_email"
                            style="color:#c2c7d0; font-size: 10px;">{{ Auth::user()->email }}</small>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Dashboard Menu -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    @lang('app.Dashboard')

                                </p>
                            </a>
                        </li>
                        <!-- Front Pages -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="{{ url('frontPages') }}"
                                class="nav-link {{ Request::segment(2) == 'fontPages' ? 'active' : '' }}">
                                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                                <img src="{{ asset('images/portfolio01.png') }}" width="20px" alt="">
                                <p class="crud">
                                    @lang('app.FRONTSIDE')

                                </p>
                            </a>
                        </li>
                        <!-- Users Menu -->
                        <li class="nav-item has-treeview">
                            <a href="{{ route('user.index') }}"
                                class="nav-link {{ Request::segment(2) == 'user' ? 'active' : '' }}">
                                <i class="fa-solid fa-users"></i>
                                <p class="crud">
                                    @lang('app.USERS')
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('user.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'user' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.SHOW') </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    @if (Auth::user()->hasPermission('users-create'))
                                        <a href="{{ url('/user/create') }}"
                                            class="nav-link {{ Request::segment(3) == 'create' ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>@lang('app.ADD') </p>
                                        </a>
                                    @else
                                        <button disabled class="nav-link" type="button">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>@lang('app.ADD') </p>
                                        </button>
                                    @endif
                                </li>
                            </ul>
                        </li>
                        <!-- Roles Menu -->
                        <li class="nav-item has-treeview">
                            <a href="{{ route('user.index') }}"
                                class="nav-link {{ Request::segment(2) == 'roles' ? 'active' : '' }}">
                                <i class="fa-solid fa-users"></i>
                                <p class="crud">
                                    @lang('app.ROLES')
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('user.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'roles' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.SHOW') </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    @if (Auth::user()->hasPermission('users-create'))
                                        <a href="{{ url('/user/create') }}"
                                            class="nav-link {{ Request::segment(3) == 'create' ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>@lang('app.ADD') </p>
                                        </a>
                                    @else
                                        <button disabled class="nav-link" type="button">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>@lang('app.ADD') </p>
                                        </button>
                                    @endif
                                </li>
                            </ul>
                        </li>
                        <!-- Permssions Menu -->
                        <li class="nav-item has-treeview">
                            <a href="{{ route('user.index') }}"
                                class="nav-link {{ Request::segment(2) == 'permission' ? 'active' : '' }}">
                                <i class="fa-solid fa-users"></i>
                                <p class="crud">
                                    @lang('app.PERMISSIONS')
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('user.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'permission' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.SHOW') </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    @if (Auth::user()->hasPermission('users-create'))
                                        <a href="{{ url('/user/create') }}"
                                            class="nav-link {{ Request::segment(3) == 'create' ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>@lang('app.ADD') </p>
                                        </a>
                                    @else
                                        <button disabled class="nav-link" type="button">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>@lang('app.ADD') </p>
                                        </button>
                                    @endif
                                </li>
                            </ul>
                        </li>
                        <!-- HomeSlider Menu -->
                        <li class="nav-item has-treeview">
                            <a href="{{ route('HomeSlider.index') }}"
                                class="nav-link {{ Request::segment(2) == 'HomeSlider' ? 'active' : '' }}">
                                <i class="fa-solid fa-users"></i>
                                <p class="crud">
                                    @lang('app.HomeSlider')
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('HomeSlider.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'HomeSlider' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.SHOW') </p>
                                    </a>
                                </li>
                                <li class="nav-item">

                                    <a href="{{ url('/HomeSlider/create') }}"
                                        class="nav-link {{ Request::segment(3) == 'create' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.ADD') </p>
                                    </a>

                                </li>
                            </ul>
                        </li>
                        <!-- About Menu -->
                        <li class="nav-item has-treeview">
                            <a href="{{ route('About.index') }}"
                                class="nav-link {{ Request::segment(2) == 'About' ? 'active' : '' }}">
                                <i class="fa-solid fa-users"></i>
                                <p class="crud">
                                    @lang('app.ABOUT')
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('About.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'About' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.ABOUT') </p>
                                    </a>
                                </li>
                                <li class="nav-item">

                                    <a href="{{ route('Gallery.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'Gallery' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.GALLERY') </p>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('skill.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'skill' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.SKILLS') </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('competency.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'competency' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.COMPETENCIES') </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('academic.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'academic' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.ACADEMIC HISTORY') </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Services Menu -->
                        <li class="nav-item has-treeview">
                            <a href="{{ route('service.index') }}"
                                class="nav-link {{ Request::segment(2) == 'service' ? 'active' : '' }}">
                                <i class="fa-solid fa-users"></i>
                                <p class="crud">
                                    @lang('app.SERVICES')
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('service.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'service' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.SERVICES') </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('mainService.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'mainService' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.MAIN') @lang('app.SERVICES') </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('contactDetail.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'contactDetail' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.CONTACT')</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('contactIcon.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'contactIcon' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.CONTACT') @lang('app.ICONS') </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('prospectDetail.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'prospectDetail' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.PROSPECT DETAILS') </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Methodologies Menu -->
                        <li class="nav-item has-treeview">
                            <a href="{{ route('methodology.index') }}"
                                class="nav-link {{ Request::segment(2) == 'methodology' ? 'active' : '' }}">
                                <i class="fa-solid fa-users"></i>
                                <p class="crud">
                                    @lang('app.METHODOLOGY')
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('methodology.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'methodology' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> @lang('app.METHODOLOGY') </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('methodologyDetail.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'methodologyDetail' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.METHODOLOGY') @lang('app.DETAILS') </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Projects Menu -->
                        <li class="nav-item has-treeview">
                            <a href="{{ route('projType.index') }}"
                                class="nav-link {{ Request::segment(2) == 'projType' ? 'active' : '' }}">
                                <i class="fa-solid fa-users"></i>
                                <p class="crud">
                                    @lang('app.PROJTYPE')
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('projType.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'projType' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('app.PROJTYPE') @lang('app.DETAILS') </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('project.index') }}"
                                        class="nav-link {{ Request::segment(3) == 'project' ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> @lang('app.PROJECT') </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Layout Menu -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Layout Options
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">6</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Top Navigation</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Top Navigation + Sidebar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/boxed.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Boxed</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fixed Sidebar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fixed Navbar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/fixed-footer.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fixed Footer</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Collapsed Sidebar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('page_title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard') }}">{{ __('app.Home') }}</a></li>
                                <li class="breadcrumb-item active">@yield('page_title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
