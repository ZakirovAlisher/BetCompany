<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VipBet.kz</title>
        <meta charset="UTF-8">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=cyrillic');
            </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('reset.css')}}">
        <link  rel="stylesheet" href="{{ URL::asset('css.css')}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 
        <!-- Подключаем jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Подключаем плагин Popper -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    
    <!-- Подключаем Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous" ></script>
  
</head>
<body>
    <div id="app">
          <header class=" ">
 
        <nav class="navbar navbar-expand-md  navbar-dark" style="background-color: #272727 ;" >
 
            <button class="navbar-toggler "   style="background-color:#949292 ;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="   "  ><img class="" width="50" height="50" src="{{URL::asset('/static/logo.png')}}"> </span>
            </button>
            <div class="collapse navbar-collapse float-right" id="navbarSupportedContent">
<ul class="navbar-nav  w-100 ">
    
<div class="row w-100">
    <li class=" col-xl-6  col-lg-5 col-md-3 col-sm-2 col-0">
        <div class="row">
         <a href="/"><img class="float-left ml-3 d-sm-none d-md-block d-none"   width="50" height="50"src="/static/logo.png"> 
       <span class="ml-2 font-weight-bold" style="color:rgb(255, 193, 77); font-size: 33px;  text-shadow: black 1px 1px 0, black -1px -1px 0, 
      black -1px 1px 0, black 1px -1px 0;"> VipBET.Kz </span></a>
            </div>
    </li>

    <div class="col-xl col-lg col-md col-sm-12  col-12"><li class="pt-3 "><a  href="#about">ABOUT</a></li></div>
   
    <div class="col-xl col-lg col-md col-sm-12  col-12"><li class="pt-3"><a   href="#process">LIVE</a></li></div>
    <div class="col-xl col-lg col-md col-sm-12  col-12" ><li class="pt-3"><a   href="#services">BONUS</a></li></div>
    <div class="col-xl col-lg col-md col-sm-12  mr-5 col-12"><li class="float-left pt-3"><a   href="/contact">CONTACT</a></li></div>
    
    @if (!Auth::check())
                   
    <div class=" col-xl col-lg col-md col-sm-12  col-12"  > <li class="pt-3" ><a   href="/login">LOGIN</a></li></div>
     @else
     
     <div class="col-xl col-lg col-md col-sm-12  col-12"><li class="pt-3"><a   href="/home">{{Auth::user()->name}}</a></li></div>
     
     @if (Auth::user()->role=="Admin")
      <div class="col-xl col-lg col-md col-sm-12  col-12"><li class="pt-3"><a   href="/admin">ADMIN PANEL</a></li></div>
     @endif
     
    @endif
    
      @if (!Auth::check())
    <div class=" col-xl col-lg col-md col-sm-12  col-12"> <li class="pt-3" ><a   href="/register">REGISTRATION</a></li></div>
    @endif
    
</div>
     
  </ul>
            </div>
</nav>
     </header>
        

        <main class="py-4">
            
            @yield('content')
            
        </main>
    </div>  
    <footer class="row  ">
<div class="col-sm-5 col-6 pl-5">
<span class="foot_name">Vip Bet, Inc.</span>
<br> 
<br> © 2020 VipBet.kz All rights reserved.<br> 
Designed by robirurk.
</div>
<div class="col-6 col-sm-2">
    hello@pirolltheme.com<br> 
    +44 987 065 908 </div>
<div class="pl-5 col-4 col-sm-1">
    Projects<br> 
    About<br> 
    Services<br> 
    Carreer</div>
<div class="col-4 col-sm-2">
    News<br> 
Events<br> 
Contact<br> 
Legals
</div>
<div class="col-4 col-sm-2">Facebook<br> 
    Twitter<br> 
    Instagram<br> 
    Dribbble</div>
</footer>
    
</body>
</html>
