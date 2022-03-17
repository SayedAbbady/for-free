<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="{{asset("assets/images/newIcon.png")}}" sizes="32x32">
  <title>Eaalim for free</title>
  <meta name="description" content="Eaalim syllbus">
  <meta name="keywords" content="learn,quran,like,arabic,native">
  <meta name="author" content="Sayed Khaled">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link href="https://fonts.googleapis.com/css?family=Cairo:200,400,900" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/ali/css/animate.css')}}">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="{{asset('assets/ali/css/style.css')}}">
  <style>
      
  
  * {
    font-family: 'Cinzel Decorative', cursive;
  }
  body{
      background:#fff;
  }
  .ul-cust li{
      display:inline-block;
  }
  .ul-cust li a{
      color:#fff;
      font-weight:100;
      font-size:13px;
  }
  .nav-item .nav-link {
      font-weight:bold;
      font-size: 14px;
  }
</style>
</head>
<body>
  @yield('content')


  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="{{asset('assets/ali/js/jquery.pagepiling.min.js')}}"></script>
  
  <script src="{{asset('assets/ali/js/code-user.js')}}"></script>
  <script src="{{asset('assets/ali/js/notify.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>