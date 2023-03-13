<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('coas-style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dist/dataTables/css/jquery.dataTables.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dist/dataTables/css/buttons.dataTables.min.css')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('dist/img/logo.png')); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
  </head>


  <body>
 
    <nav class="navbar-default navbar-fixed-top">
      <a class="navbar-brand" href="#">CPSU - COAS V.1.0</a><span class="navbar-brand pull-right user-txt">Logged as: <?php echo e(ucfirst(Auth::user()->fname)); ?> <?php echo e(ucfirst(Auth::user()->lname)); ?></span>
      <div class="navbar-header navbar-fixed-top text-center">
          <img src="<?php echo e(asset('dist/img/logo.png')); ?>" style="width:100px;">
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
                  <a href="<?php echo e(route('settings')); ?>" class="list-group-item">Accounts</a>
              </ul>
              <div class="page-header">
                  CPSU - COAS V.1.0
              </div>
              <?php echo $__env->yieldSection(); ?>

        </div>

         <div class="sidebar-menu col-md-9">
          <?php $__env->startSection('workspace'); ?>
          
          <?php echo $__env->yieldSection(); ?>
        </div>
      </div>
    <br><br><br><br>
    <footer class="footer">
      <div class="container">
           <p class="text-muted">CPSU - COAS V.1.0 is built through O-S Technology, a Shukerz-Based product. Copyright © 2023 CPSU, All Rights Reserved.</p>
      </div>
    </footer>

    <script src="<?php echo e(asset('bootstrap/js/jquery-1.12.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/dataTables/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/dataTables/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/dataTables/js/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/dataTables/js/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/dataTables/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/dataTables/js/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/dataTables/js/buttons.html5.min.js')); ?>"></script>
    <?php $__env->startSection('script'); ?>
      
    <?php echo $__env->yieldSection(); ?>
  </body>
</html>

<?php /**PATH C:\xampp\htdocs\resources\views/layouts/master_settings.blade.php ENDPATH**/ ?>