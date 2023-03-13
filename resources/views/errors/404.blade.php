<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('coas-style.css') }}">
    <link rel="icon" href="{{ asset('dist/img/logo.png') }}" type="image/png">
    <title>CPSU || COAS - Login</title>
  </head>
  <body>
      <div class="container col-lg-offset-2 col-md-offset-4 col-sm-offset-3 col-xs-offset-3 col-lg-8 col-md-6 col-sm-6 col-xs-6 login-center bg-inputs">

          <div class="row ads">
            <div class="col-lg-7 hidden-md hidden-sm hidden-xs"> 
              <div class="page-header">
                <h2 style="font-weight: bold;color:#04401f;">CPSU - COAS V1.0</h2>
              </div>

              <h5><b>Update:</b> <i>Posted: +UTC 23:00:23 23:18</i></h5>

               
              <div id="carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <p class="lead">Consolidated Online Access System (COAS) is an advanced application system for the Univeristy Frontline Services. </p>
                    <p class="lead">CPSU - COAS V.1.0 is built through O-S Technology, a Shukerz-Based product.</p> 
                  </div>
                  <div class="item">
                    <p class="lead">Consolidated Online Access System (COAS) is an advanced application system for the Univeristy Frontline Services. </p>
                    <p class="lead">CPSU - COAS V.1.0 is built through O-S Technology, a Shukerz-Based product.</p> 
                  </div>
                </div>
              </div>
              <p>Visit <a href="https://cpsu.edu.ph" target="_blank" style="color:#04401f;"><b>Official Website</b></a> for more information.</p>
            </div>

            <div class="col-lg-5 logo">
              <div class="row">
                <img src="{{ asset('dist/img/logo.png') }}">
              </div>

              <div class="row col-lg-12">
                <h3 class="login-txt">Ouch! Something went wrong</h3>
                <h1 class="login-txt">404</h1>
                <h3 class="login-txt">Page not found</h3>
                <p class="login-txt-p">Contact Support Administrator</p>
              </div>

                <div class="row">
                  <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-8 col-sm-8 col-xs-8">
                
                  </div>
                </div>
            </div>
          </div>
        </div>

</div>
<script src="{{ asset('bootstrap/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>  
</body>
</html>


      