<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Geek Gear Governor</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{ elixir('css/all.css') }}">
<script src="{{ elixir('js/all.js') }}"></script>
<style type="text/css">
body {
  padding-top: 50px;
}
</style>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Geek Gear Governor</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="/home">Home</a></li>
        <li>{!! link_to_action('ItemController@index', $title = "Items", $parameters = array(), $attributes = array()) !!}</li>
        <li><a href="/contact">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if (!Auth::check())
        <li><a href="/auth/login">Login</a></li>
        @endif
        @if (Auth::check())
        <li><a>Hi {{ Auth::user()->name }}</a></li>
        <li><a href="/auth/logout">Logout</a></li>
        @endif
      </ul>
        </div><!--/.navbar-collapse -->
  </div>
</nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
