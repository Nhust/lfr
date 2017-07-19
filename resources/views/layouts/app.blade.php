<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/css.css" rel="stylesheet">
    <link href="/css/simple-sidebar.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Lfr = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
</head>

<body>

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <div class="title-site"><a href="{{url('/')}}">Looking For Raid</a></div>
            <br> <br>
            <form class="form-horizontal" role="form" method="GET" action="{{URL::route('search')}}">
                <div class="form-group">
                    <li><input type="text" name="search" id="search" placeholder="Recherche" class="form-control"></li>
                </div>
            </form>
        @if (Auth::guest())
                <li><a href="{{ url('/login') }}" class="nav-link first"><i class="icone"><img src="/image/profile.png"></i>Login</a></li>
                <li><a href="{{ url('/register') }}" class="nav-link"><i class="icone"><img src="/image/profile.png"></i>S'enregister</a></li>
            @else
                <div class="pseudo">{{Auth::user()->prenom}}</div>
                <div class="btag">{{Auth::user()->btag}}</div>
                <div class="event-creer"><a href="{{URL::route('event.create')}}">Créer un Event</a></div>

            <li><a href="{{URL::route('profile.index',Auth::user()->id)}}" class="nav-link first"><i class="icone"><img src="/image/profile.png"></i>Profile</a></li>
            <li><a href="{{URL::route('profile.showCharacters',Auth::user()->id)}}" class="nav-link"><i class="icone"><img src="/image/character.png"></i>Personnages</a></li>
            <li><a href="{{URL::route('profile.showEvents',Auth::user()->id)}}" class="nav-link"><i class="icone"><img src="/image/event.png" alt=""></i>Evènements</a></li>
            <li>
                <a href="{{ url('/logout') }}" class="nav-link"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="icone"><img src="/image/logout.png" alt=""></i>
                    Deconnecter
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
                @endif
        </ul>
    </div>
    <div class="jump-content"></div>
    <a href="#menu-toggle" class="btn-nav" id="menu-toggle"><img  src="/image/hamburger.png" alt="" class="hamburger"></a>

    <div id="page-content-wrapper">
        @yield('content')
    </div>

</div>


</body>

</html>

</header>
<script src="/js/jquery.js"></script>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>
</html>
