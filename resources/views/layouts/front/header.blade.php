<?php $segment = Request::segments();?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Home</title>
    <link href="css/all.css" rel="stylesheet">
    <link href="css/fullpage.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.default.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Philosopher:400,700|Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
  </head>
  
  
  <body>
    <header>

      <div class="main-navigate">
        <div class="container-fluid">
          <div class="row nav-flex">
            <div class="sidenav" id="mySidenav">
              <a class="closebtn" href="javascript:void(0)" onclick="closeNav()">×</a>
            </div>
            
            <div class="mobilecontainer hidden-lg hidden-md">
              <span class="pull-right" onclick="openNav()" style="font-size:30px;cursor:pointer">☰</span>
            </div>
            
            <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="logo">
                <a href="{{route('home')}}"><img alt="" class="img-responsive" src="{{asset($logo->img_path)}}"></a>
              </div>
            </div>
            
            <div class="col-md-9 col-sm-8 col-xs-12">
              <div class="navigation">
                <ul class="navbar-set hidden-xs hidden-sm">
                  <li>
                    <a class="list-group-item active" href="{{route('home')}}">Home</a>
                  </li>
                    <li>
                      <a class="list-group-item" href="{{route('about_author')}}">About</a>
                    </li>
                    <li>
                      <a class="list-group-item" href="{{route('my_book')}}">Book</a>
                    </li>

                    <li>
                      <a class="list-group-item" href="{{route('reviews')}}">Reviews</a>
                    </li>
                </ul>
              </div>
            </div>
            
          </div>
        </div>
      </div>
     
    </header>