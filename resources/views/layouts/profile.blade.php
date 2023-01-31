<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="uth-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--CSRF Token-->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--各ページごろにタイトルタグを入れるために空けておく
        -->
        <title>@yield('titlr')</title>
        
        <!--Script-->
        {{--Laravel標準で用意されているJAvascriptを読み込む--}}
        <script src="`{{ secure_asset('js/app.js') }}" defer></script>
        
        <!--Fonts-->
        <link rel="dsn-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        
        <!--Styles-->
        {{-- Laravel標準で用意されているCSSを読み込みます　--}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/profile.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{--画面上部のナビゲーションバー--}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href"{{ url('/') }}">
                        {{ config('app.name','Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" 
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!--Left Side NAvbar-->
                        <ul class="navbar-nav ms-auto">
                            
                        </ul>
                        
                        <!--Right Side Of Navbar-->
                        <ul class="navbar-nav">
                        </ul>
                    </div>
                </div>
            </nav>
            {{--ここまでナビバ---}}
            
            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておく--}}
                @yield('content')
            </main>
        </div>
    </body>
</html>