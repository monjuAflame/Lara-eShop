<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-commerce</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
   
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">

  <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <style>
  #demo {
  height: 150px;
  width: 1300px;
}
   #demo img {
      height: 100%;
      width: 100%;
    }
    /*.carousel-inner img{
      width: 100%;
      height: 100%;
    }*/
    .navbar{
      box-shadow: 0 0 5px #ccc;
      background: #f8f9fa;
    }
  </style>

</head>
<body>
  
  @include('frontend.slide')
  @include('frontend.menu')

 <div class="container">
   <div class="row">
      @yield('content')
   </div>
 </div>



@yield('script')
</body>
</html>
