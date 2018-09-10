<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name','Jutsyvel')}}</title>
</head>
<body>
    <div id="app">

            @include('layout.nav')

            <br/>
            <br/>

            <main role="main" class="container">
                @include('helpers.messages')
                @yield('content')
            </main>

            <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
            <script>
                CKEDITOR.replace( 'article-ckeditor' );
            </script>

            <footer class="footer">
                <div class="container">
                <span class="text-muted">v1.1 - Laravel 5.6 (With Authentication) - Juts</span>
                </div>
          </footer>


    </div>
</body>
</html>
