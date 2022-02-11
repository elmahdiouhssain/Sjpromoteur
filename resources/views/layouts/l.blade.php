<!DOCTYPE html>
<html class="no-js">
<!--<![endif]-->
<head>
	<html prefix="og: http://ogp.me/ns#">
	<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if(isset($title))<title>Commercial managment | {{ $title }}</title> @else <title>Commercial managment | 2022</title> @endif
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


	<body></body>


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