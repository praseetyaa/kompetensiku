<style type="text/css">
    #navbarSupportedContent {background: {{ get_warna_primer() }}!important;}
    .navbar-header[data-logobg=skin5] {background: var(--white)!important;}
    #main-wrapper .left-sidebar[data-sidebarbg=skin5], #main-wrapper .left-sidebar[data-sidebarbg=skin5] ul {background: {{ get_warna_tersier() }}!important;}
    .page-wrapper {background: linear-gradient(180deg, #eeeeee, #ffffff)!important;}
    .page-wrapper > .container-fluid {min-height: calc(100vh - 163px);}
    .logo-text {font-weight: bold; font-size: 1.3rem; text-transform: uppercase; color: var(--color-1)!important;}
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

    /*baonk here*/
    :root{ 
        --color-1: #000E38;
        --color-1-light: #e4fff4;
        --color-2: #34495e; 
        --border-light: rgba(2555,255,255,.5); 
        --shadow: 0 .125rem .25rem rgba(0,0,0,.075);
        --transition: .25s ease;
        --transition-cubic: .5s cubic-bezier(0.65, 0.05, 0.36, 1);
        --font-family-sans-serif: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans","Liberation Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"!important;
    }
    .rounded-1{border-radius: .5em!important}
    .rounded-2{border-radius: 1em!important}
    .rounded-3{border-radius: 1.5em!important}
    .rounded-4{border-radius: 2em!important}
    .rounded-5{border-radius: 2.5em!important}
    .shadow{box-shadow: var(--shadow)!important}
    .text-decoration-none{text-decoration: none!important}

    #navbarSupportedContent{background-color: var(--white)!important}
    .topbar{box-shadow: var(--shadow)}
    .navbar-dark .navbar-nav .active>.nav-link, .navbar-dark .navbar-nav .nav-link.active, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .show>.nav-link, .topbar .nav-toggler, .topbar .topbartoggler{color: var(--dark)!important}
    .navbar-dark .navbar-nav .nav-link, .navbar-dark .navbar-nav .nav-link:focus, .navbar-dark .navbar-nav .nav-link:hover{color: var(--gray)}
    #main-wrapper .left-sidebar[data-sidebarbg=skin5], #main-wrapper .left-sidebar[data-sidebarbg=skin5] ul{background: var(--white)!important; box-shadow: unset;}
    #main-wrapper .left-sidebar[data-sidebarbg=skin5]{box-shadow: var(--shadow)}
    .left-sidebar{transition: var(--transition)}
    .sidebar-nav{padding: 0 .8em 0 .8em;}
    .sidebar-nav .has-arrow:after{border-color: var(--dark); top: 21px}
    .sidebar-nav ul .sidebar-item .sidebar-link{margin-bottom: .5em; border-radius: .5em}
    .sidebar-nav ul .sidebar-item .sidebar-link, .sidebar-nav ul .sidebar-item .sidebar-link i{color: var(--dark)}
    .sidebar-nav ul .sidebar-item.selected>.sidebar-link, .sidebar-nav ul .sidebar-item.selected>.sidebar-link i{color: var(--white)}
    .sidebar-nav ul .sidebar-item.selected>.sidebar-link{border-radius: .5em; background: var(--color-1)}
    .sidebar-nav ul .sidebar-item.selected>.has-arrow:after{border-color: var(--light)}

    .page-wrapper{background: var(--light)!important; transition: var(--transition)}
    .alert, .card, .navbar-nav .dropdown-menu{border-radius: .5em}
    .navbar-nav .dropdown-menu{background-color: var(--white)}
    .navbar-nav .dropdown-menu .dropdown-item.bg-success{background-color: var(--color-1)!important; color: var(--white)}
    .topbar .top-navbar .navbar-header{transition: var(--transition); background-color: var(--white)}
  
</style>