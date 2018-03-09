<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>DOCUMENTUM</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="/css/animate.css">
  <link href="/css/animate.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet" />

  <!-- =======================================================
    Theme Name: Day
    Theme URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>

  @yield('header')

  @yield('slider')

  @yield('services')
  
  @yield('footer')
  

  

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>
  <!-- Include Ajax -->
  
  
  <script src="/js/wow.min.js"></script>
  
  <script>
    wow = new WOW({}).init();
  </script>
</body>

</html>
