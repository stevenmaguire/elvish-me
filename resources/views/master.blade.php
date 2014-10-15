<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Elvish Me - Elvish ipsum generator and definitions of elvish language</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/5.4.6/css/foundation.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-1132651-15', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body>
    <header class="serious">
        <div class="row">
            <div class="small-12 columns">
                <h1><span><a href="{{ route('home') }}">Elvish Ipsum</a></span></h1>
                <h2 class="show-for-medium-up"><span>You always you just need a little elvish in your life.</span></h2>
            </div>
        </div>
    </header>
    @yield('content')
    <footer>
        <div class="row">
            <div class="small-12 columns">
                <p>&copy; {{ date('Y') }} <a href="http://stevenmaguire.com">Steven Maguire</a> &bull; Originally crafted for a <a href="http://bitly.com/laravel-ci">presentation</a>.</p>
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
