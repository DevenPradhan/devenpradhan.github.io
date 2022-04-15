<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">

                <a class="navbar-brand" href="#">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <div class="col-md-8">
                    <ul class="navbar-nav tabs">
                        <li class="nav-item">
                            <a class= "nav-link navi-h" href="{{route('user')}}">Dashboard</a>
                        </li>
                       <li class="nav-item dropdown navi-h">
                    
                           
                                <a data-toggle="dropdown" href="#" id="navbardrop" class="nav-link dropdown-toggle navi-h">Products</a>
                                <ul class="dropdown-menu" style="border: none;">
                                    <li ><a class="dropdown-item navi-h" href="{{route('get.indoors.list')}}">Indoor</a></li>
                                    <li ><a class="dropdown-item navi-h" href="{{route('get.outdoors.list')}}">Outdoor</a></li>
                                    <li ><a class="dropdown-item navi-h" href="{{route('get.accessories.list')}}">Accessories</a></li>
                                    <div class="dropdown-divider"></div>
                                    <div class="dropdown-header">Others</div>
                                </ul>
                     </li>
                     <li class="nav-item">
                        <a href="{{route('request.items')}}" class="nav-link navi-h">Request Item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navi-h" href="{{route('user.items')}}">Your Items</a>
                    </li>
                     
                        
                    </ul>
                </div>

                    <!-- Right Side Of Navbar -->
                    <div class="col ">
                    <ul class="navbar-nav tabs justify-content-end">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item" >
                                    <a class="nav-link navi-h" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link navi-h" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown navi-h">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle navi-h" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item navi-h" href="{{route('user.profile')}}">Profile</a>
                                    <a class="dropdown-item navi-h" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

   <style type="text/css">
           body{
            background: #D1F2EB;
            min-height: 100vh;
            display: flex;
            flex-direction: column;

        }
        nav{
            background: #2E4053;


        }
        footer{
            margin-top: auto;
            bottom: 0px;
            width: 100%;
        }

        .cnav{
            background-color: #E9F7EB;
        }
        .caro{
            background-color: #E9F7EB;
            border-style: solid;
            border-color: lightgrey;
            border-radius: 5px;
            border-width: 1px;
            max-width: 100%;
            height: 400px;
        }

        .navi-h:hover {
            background-color:  #5D6D7E;
            border-radius: 2px;
            color: black !important;
        }
        .navbar-nav .dropdown-menu {
            position: static;
            float: none;
        }

        .dropdown-custom {
            background-color: whitesmoke;



        }
        .rcorners1 {
          border-radius: 10px;

          width: 66.67px;
          height: 50px; 
        }
        .def_size {
            width: 200px;
            height: auto;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; // remove the gap so it doesn't close  
        }
        .thumbnail{
            width: 80px;
        }

        .thumbnail:hover{
            width: 90px;
            height: auto;
            transition: width .5s;
            position: relative;

        }
        .table td.fit, 
        .table th.fit {
        white-space: nowrap;
        width: 2%;
        }

   </style>
   
</body>

</html>
