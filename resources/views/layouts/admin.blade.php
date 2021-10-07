<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="fr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="fr"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/css/normalize.css">
    <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/scss/style.css">
    <link href="{{ config('app.url') }}resources/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>

    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('admin.logout') }}"> Déconnexion </a>
                    </li>
                    <h3 class="menu-title">MENU</h3><!-- /.menu-title -->
                    <li>
                        <a href="{{ route('sessions.index') }}"> 
                            <i class="menu-icon fa fa-tasks"></i>Sessions 
                        </a>
                    </li>                     
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Inscriptions</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="fa fa-sun-o"></i>
                                <a href="{{ route('registrations.index') }}">Activités d'été</a>
                            </li>
                            <li>
                                <i class="fa fa-superscript"></i>
                                <a href="{{ route('scholar.index') }}">Soutien scolaire</a>
                            </li>
                        </ul>
                    </li>                   
                    <li>
                        <a href="{{ route('texts.index') }}"> 
                            <i class="menu-icon fa fa-file-text-o"></i>Textes 
                        </a>
                    </li>                     <li>
                    	<a href="{{ route('configmails.index') }}"> 
                    		<i class="menu-icon fa fa-envelope-o"></i>Adresses mail 
                    	</a>
                    </li> 
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->
    @yield('content')

    <script src="{{ config('app.url') }}resources/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ config('app.url') }}resources/assets/js/plugins.js"></script>
    <script src="{{ config('app.url') }}resources/assets/js/main.js"></script>


    {{-- <script src="{{ config('app.url') }}resources/assets/js/lib/chart-js/Chart.bundle.js"></script> --}}
    {{-- <script src="{{ config('app.url') }}resources/assets/js/dashboard.js"></script> --}}
    {{-- <script src="{{ config('app.url') }}resources/assets/js/widgets.js"></script> --}}
    <script src="{{ config('app.url') }}resources/assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="{{ config('app.url') }}resources/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="{{ config('app.url') }}resources/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="{{ config('app.url') }}resources/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    @if(Auth::check())
        <script src="{{ config('app.url') }}resources/assets/js/scripts.js"></script>
    @endif
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{--     <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script> --}}

</body>
</html>
