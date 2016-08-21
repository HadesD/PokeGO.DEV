<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>{{--  --}}</title>
    <link rel="stylesheet" href="{{ Asset('fonts/material-icons.css') }}" media="screen" charset="utf-8" />
    <link rel="Shortcut Icon" href="{{ Asset('fav.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ Asset('css/materialize.min.css') }}" media="screen" charset="utf-8" />
  </head>
  <body>
    @yield('body')
    <script type="text/javascript" src="{{ Asset('js/jquery-3.1.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ Asset('js/materialize.min.js') }}"></script>
  </body>
</html>
