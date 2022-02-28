<!DOCTYPE html>
<html class="no-js">
<!--<![endif]-->
<head>
	<html prefix="og: http://ogp.me/ns#">
	<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if(isset($title))<title>Sjpromorteur | {{ $title }}</title> @else <title>Sjpromorteur | beta version 2021</title> @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('static/css/bootstrap.css') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('static/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('static/css/all.css') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('static/css/style.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('static/css/jquery.dataTables.min.css') }}" rel="stylesheet" media="screen">
	<link rel="shortcut icon" href="{{ asset('static/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('static/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/buttons.dataTables.min.css') }}">
    <link href="{{ asset('static/calendar/fullcalendar.css') }}" rel="stylesheet" media="screen">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link rel="apple-touch-icon" href="{{ asset('static/favicon.ico') }}"/>
	<meta name="theme-color" content="#dc3545">
	<meta name="msapplication-navbutton-color" content="#dc3545">
	</head>
	<body class="adminbody">
    <div id="main">
        <div class="headerbar">
            <div class="headerbar-left">
                <a href="{{ route('dashboard.index') }}" class="logo">
                    <img alt="Logo" src="{{ asset('static/images/logo.png') }}" />
                    <span>SjPromoteur</span>
                </a>
            </div>
            <nav class="navbar-custom">
                <ul class="list-inline float-right mb-0">
                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('static/images/avatars/admin.png') }}" alt="Profile image" class="avatar-rounded">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow">
                                    <small>{{Auth::user()->name}}</small>
                                </h5>
                            </div>
                            <!-- item-->
                            <a href="/profile/{{Auth::user()->name}}" class="dropdown-item notify-item">
                                <i class="fas fa-user"></i>
                                <span>Profile</span>
                            </a>
                            <a href="/profile/agenda/{{Auth::user()->id}}" class="dropdown-item notify-item">
                                <i class="fas fa-calendar"></i>
                                <span>Agenda</span>
                            </a>

                            <!-- item-->
                            <a href="{{ route('log.out') }}" title="Déconnection" onclick="return confirm('Vous etes sur deconnecté la session !')" class="dropdown-item notify-item">
                                <i class="fas fa-power-off"></i>
                                <span>Se deconnecter</span>
                            </a>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fas fa-bars"></i>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- End Navigation -->
        <!-- Left Sidebar -->
        <div class="left main-sidebar">
            <div class="sidebar-inner leftscroll">
                <div id="sidebar-menu">
                    <ul>
                        
                        <center style="color: white;"><hr>----SITUATIONS----<hr></center>
                        @can('adherant-list')
                        <li class="submenu">
                            <a href="{{ route('adherants.index') }}">
                                <i class="fas fa-clipboard-list"></i>
                                <span> Adhèrants </span>
                            </a>
                        </li>
                        @endcan
                        @can('employees-list')
                        <li class="submenu">
                            <a href="{{ route('emps.index') }}">
                                <i class="fas fa-dolly"></i>
                                <span> Ouvrièrs </span>
                            </a>
                        </li>
                        @endcan
                        @can('cheque-list')
                        <li class="submenu">
                            <a href="{{ route('stats-cheques.index') }}">
                                <i class="fas fa-money-check-alt"></i>
                                <span> Règlements </span>
                            </a>
                        </li>
                        @endcan
                        <center style="color: white;"><hr>----ACHATS----<hr></center>
                        @can('suppliers-list')
                        <li class="submenu">
                            <a href="{{ route('fournisseurs.index') }}">
                            <i class="fas fa-boxes"></i>
                                <span> Fournisseurs </span>
                            </a>
                        </li>
                        @endcan
                        
                        @can('facture-list')
                        <li class="submenu">
                            <a href="{{ route('factures.index') }}">
                                <i class="fas fa-file-invoice"></i>
                                <span> Factures </span>
                            </a>
                        </li>
                        @endcan
                        <li class="submenu">
                            <a href="{{ route('articles.index') }}">
                                <i class="fas fa-cube"></i>
                                <span> Articles </span>
                            </a>
                        </li>
                        <center style="color: white;"><hr>----Projects----<hr></center>
                        <li class="submenu">
                            <a href="#">
                                <i class="fas fa-building"></i>
                                <span> Lots </span>
                            </a>
                        </li>
                        @can('amical-list')
                        <li class="submenu">
                            <a href="{{ route('amicals.index') }}">
                                <i class="fas fa-toolbox"></i>
                                <span> Amicaux </span>
                            </a>
                        </li>
                        @endcan
                        @can('societe-list')
                        <li class="submenu">
                            <a href="{{ route('companys.index') }}">
                                <i class="fas fa-building"></i>
                                <span> Sociète </span>
                            </a>
                        </li>
                        @endcan
                        <center style="color: white;"><hr>----Administration----<hr></center>
                        @can('certificat-list')
                        <li class="submenu">
                            <a href="{{ route('certificats.index') }}">
                                <i class="fas fa-file-word"></i>
                                <span> Certificats </span>
                            </a>
                        </li>
                        @endcan
                        @can('statistiques-list')
                        <li class="submenu">
                            <a href="{{ route('statistiques.index') }}">
                                <i class="fas fa-chart-pie"></i>
                                <span> Statistiques </span>
                            </a>
                        </li>
                        @endcan
                        @can('users-list')
                        <li class="submenu">
                            <a href="{{ route('users.index') }}">
                                <i class="fas fa-users"></i>
                                <span>Employeés </span>
                            </a>
                        </li>
                        @endcan
                        @can('role-list')
                         <li class="submenu">
                            <a href="{{ route('roles.index') }}">
                                <i class="fas fa-users-cog"></i>
                                <span>Roles & Permissions </span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- End Sidebar -->
	       @yield('content')
	       <footer class="footer">
            <span class="text-right">                
                Copyright <a target="_blank" href="#">SJPROMOTEUR</a>
            </span> | <span class="text-right">                
                Developé par  <a target="_blank" href="https://github.com/elmahdiouhssain/">Elmahdi ouhssain</a>
            </span>
        </footer>
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('static/js/modernizr.min.js') }}"></script>
	@include('layouts.jdatatable')
    <script src="{{ asset('static/calendar/moment.min.js') }}"></script>
    <script src="{{ asset('static/calendar/fullcalendar.js') }}"></script>
    <script src="{{ asset('static/calendar/fr.js') }}"></script>
    <script src="{{ asset('static/calendar/gcal.min.js') }}"></script>
	<script src="{{ asset('static/js/popper.min.js') }}"></script>
	<script src="{{ asset('static/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('static/js/bootstrap.js') }}"></script>
	<script src="{{ asset('static/js/admin.js') }}"></script>
    <script src="{{ asset('static/js/dom.js') }}"></script>
    </body>
    </html>