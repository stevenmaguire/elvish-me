<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel CI Demo</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/5.4.6/css/foundation.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <div class="row">
            <div class="small-12 columns">
                <h1><a href="{{ route('home') }}">Elvish Ipsum</a></h1>
                <h2>Sometimes you just need some elvish in your life.</h2>
            </div>
        </div>
    </header>
    @yield('content')
    <footer>
        <div class="row">
            <div class="small-12 columns">
                <p>&copy; {{ date('Y') }} <a href="http://stevenmaguire.com">Steven Maguire</a></p>
            </div>
        </div>
    </footer>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.4.6/js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>
</html>
