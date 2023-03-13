<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('coas-style.css')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('dist/img/logo.png')); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
  </head>
  <body>
 
    <nav class="navbar-default navbar-fixed-top">
      <a class="navbar-brand" href="#">CPSU - COAS V.1.0</a><span class="navbar-brand pull-right user-txt">Logged as: <?php echo e(ucfirst(Auth::user()->fname)); ?> <?php echo e(ucfirst(Auth::user()->lname)); ?></span>
      <div class="navbar-header navbar-fixed-top text-center">
          <img src="<?php echo e(asset('dist/img/logo.png')); ?>">
      </div>
    </nav>

    <div class="container-fluid" style="margin-top: 65px;">
        <div class="sidebar-menu col-md-2">
              <div class="page-header">
                  <?php $__env->startSection('sideheader'); ?>
                  <?php echo $__env->yieldSection(); ?>
              </div>
              <?php $__env->startSection('sidemenu'); ?>
               <ul class="list-group">
                  <a href="<?php echo e(route('usermasterList')); ?>" class="list-group-item">List of Users</a>
                  <a href="" class="list-group-item">Add Users</a>  
              </ul>
              <ul class="list-group">
                <a href="<?php echo e(route('settings')); ?>"class="list-group-item">Settings</a>
              </ul>
              <?php echo $__env->yieldSection(); ?>

        </div>

         <div class="sidebar-menu col-md-9">
          <?php $__env->startSection('workspace'); ?>
          <ol class="breadcrumb">
              <li><a href="<?php echo e(route('home')); ?>" class="list-group-item glyphicon glyphicon-home"></a></li>
              <li>Settings</li>
          </ol>
              <?php if(Session::has('success')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                  <?php elseif(Session::has('fail')): ?>
                    <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div> 
              <?php endif; ?>
            <div class="workspace-top" style="text-align: center;">
              <h1 class="fas fa-mug-hot fa-7x"></h1>
              <h1><span style="color:#ffff66;font-size: 70px;">Eey!</span> Grab a coffee before doing something.</h1>
              <p>  <i class="fas fa-quote-left fa-2x fa-pull-left"></i>
              Gatsby believed in the green light, the orgastic future that year by year recedes before us.
              It eluded us then, but that’s no matter — tomorrow we will run faster, stretch our arms further...
              And one fine morning — So we beat on, boats against the current, borne back ceaselessly into the past.
              </p>
              <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            </div> 
            <?php echo $__env->yieldSection(); ?>
        </div>
      </div>
    <br><br><br><br>
    <footer class="footer navbar-fixed-bottom">
      <div class="container">
           <p class="text-muted">CPSU - COAS V.1.0 is built through O-S Technology, a Shukerz-Based product. Copyright © 2023 CPSU, All Rights Reserved.</p>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app.js')); ?>"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>
    <?php $__env->startSection('script'); ?>
      
    <?php echo $__env->yieldSection(); ?>
  </body>
</html>

<?php /**PATH E:\Devs\coas\resources\views/layouts/master_settings.blade.php ENDPATH**/ ?>