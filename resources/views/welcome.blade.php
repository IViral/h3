<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$title or 'Home - H3%'}}</title>

        <!-- Fonts -->
        @yield('csstop')
        <link href="{{url('css/font-raleaw.css')}}?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 540;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                font-weight: 600;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            @yield('cssc')
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{url('/admin/home')}}">Acessa Painel</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    H3%
                </div>

                <div class="links">
                    <a href="{{url('')}}">Home</a>
                    <a href="{{url('saloes')}}">Pesquisar Salão</a>
                    <a href="{{url('admin/salao')}}">Cadastre Seu Salão</a>
                    <a href="https://github.com/laravel/laravel">Informações Sobre o Projeto</a>
                </div>
            </div>
        </div>
        <div class="contenty">
            @yield('content')
        </div>
        <script src="{{url('js')}}/bootstrap.js"></script>
        <script>
        @yield('jsbt')
        </script>
    </body>
</html>
