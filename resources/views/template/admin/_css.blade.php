
    <style type="text/css">
		::-webkit-scrollbar {width: 5px; overflow: visible;}
		::-webkit-scrollbar-track {background: {{ get_warna_scroll_track() }};}
		::-webkit-scrollbar-thumb {background: {{ get_warna_scroll_thumb() }};}
        #navbarSupportedContent {background: {{ get_warna_primer() }}!important;}
        .navbar-header[data-logobg=skin5] {background: {{ get_warna_sekunder() }}!important;}
        #main-wrapper .left-sidebar[data-sidebarbg=skin5], #main-wrapper .left-sidebar[data-sidebarbg=skin5] ul {background: {{ get_warna_tersier() }}!important;}
		.page-wrapper {background: linear-gradient(180deg, #eeeeee, #ffffff)!important;}
        .page-wrapper > .container-fluid {min-height: calc(100vh - 163px);}
        .logo-text {font-weight: bold; font-size: 1.3rem; text-transform: uppercase; color: {{ get_warna_teks_logo() }}!important;}
        .navbar-nav .dropdown-menu {background-color: #eeeeee;}
        .dropdown-menu .dropdown-item:hover {background-color: #dddddd;}
		.sidebar-nav ul .sidebar-item .sidebar-link {padding: 8px;}
		.sidebar-nav ul .sidebar-item .first-level .sidebar-item .sidebar-link {padding: 8px 15px;}
        .card .card-title {margin-bottom: 0px; font-weight: 700;}
        .border-top, .border-bottom {padding: 1.25rem;}
        label {font-weight: 700;}
        option:disabled {background-color: #e5e5e5;}
        .form-check-label {font-weight: 600!important;}
        .form-control {border-color: #caccce;}
        .input-group-text {border-color: #caccce;}
	    .modal {overflow-y: auto;}
    </style>