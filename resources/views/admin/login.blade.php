<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/css/normalize.css">
    <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ config('app.url') }}resources/assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a">
                        <img class="align-content" width="75%" src="http://csevere.be/wp-content/uploads/2018/04/logo_ASBL_La_Coh%C3%A9sion_Sociale_Evere.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form action="" method="POST" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Login</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Connexion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ config('app.url') }}resources/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="{{ config('app.url') }}resources/assets/js/popper.min.js"></script>
    <script src="{{ config('app.url') }}resources/assets/js/plugins.js"></script>
    <script src="{{ config('app.url') }}resources/assets/js/main.js"></script>


</body>
</html>
