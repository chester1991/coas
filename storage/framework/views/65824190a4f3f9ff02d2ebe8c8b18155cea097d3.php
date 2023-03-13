<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('coas-style.css')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(asset('dist/img/logo.png')); ?>" type="image/png">
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
        <div class="sidebar-menu">
            <a href="<?php echo e(route('home')); ?>" type="button" class="btn btn-default fas fa-school fa-2x sidebar-icon" data-toggle="tooltip" data-placement="top" title="Homepage"><p class="sidebar-link">Home</p></a>
            <a href="<?php echo e(route('admission-index')); ?>" type="button" class="btn btn-default fas fa-address-card fa-2x sidebar-icon" data-toggle="tooltip" data-placement="top" title="Admission"><p class="sidebar-link">Admission</p></a>
            <button type="button" class="btn btn-default fas fa-balance-scale fa-2x sidebar-icon" data-toggle="tooltip" data-placement="top" title="Assessment/Billing" style="color:grey;"><p class="sidebar-link" style="color:grey;">Assessment</p></button>
            <button type="button" class="btn btn-default fas fa-calculator fa-2x sidebar-icon" data-toggle="tooltip" data-placement="top" title="Cashiering" style="color:grey;"><p class="sidebar-link" style="color:grey;">Cashiering</p></button>
            <button type="button" class="btn btn-default fas fa-calendar-alt fa-2x sidebar-icon" data-toggle="tooltip" data-placement="top" title="Scheduling" style="color:grey;"><p class="sidebar-link" style="color:grey;">Scheduling</p></button>
            <button type="button" class="btn btn-default fas fa-laptop-code fa-2x sidebar-icon" data-toggle="tooltip" data-placement="top" title="Enrolment" style="color:grey;"><p class="sidebar-link" style="color:grey;">Enrolment</p></button>
            <button type="button" class="btn btn-default fas fa-users fa-2x sidebar-icon" data-toggle="tooltip" data-placement="top" title="Scholarship" style="color:grey"><p class="sidebar-link" style="color:grey">Scholarship</p></button>
            <button type="button" class="btn btn-default fas fa-book-open fa-2x sidebar-icon" data-toggle="tooltip" data-placement="top" title="Grading Access" style="color:grey;"><p class="sidebar-link" style="color:grey;">Grading</p></button>
            <button type="button" class="btn btn-default fas fa-file-alt fa-2x sidebar-icon" data-toggle="tooltip" data-placement="top" title="Document Request" style="color:grey;"><p class="sidebar-link" style="color:grey;">Doc. Request</p></button>
            <a href="<?php echo e(route('settings')); ?>" type="button" class="btn btn-default fas fa-cog fa-2x sidebar-icon" data-toggle="tooltip" data-placement="top" title="Settings"><p class="sidebar-link">Settings</p></a>

            
            <a href="<?php echo e(route('logout')); ?>" type="button" class="btn btn-default fas fa-sign-out-alt fa-2x sidebar-icon hidden-sm hidden-xs hidden-md pull-right" data-toggle="tooltip" data-placement="top" title="Logout"><p class="sidebar-link">Logout</p></a>
            <a href="<?php echo e(route('logout')); ?>" class="logout-link"><button type="button" class="btn btn-default fas fa-sign-out-alt fa-2x sidebar-icon visible-xs-inline visible-sm-inline visible-md-inline" data-toggle="tooltip" data-placement="top" title="Logout"><p class="sidebar-link">Logout</p></button></a>
        </div>

        <div class="sidebar-menu col-md-2">
              <div class="page-header">
                  <?php $__env->startSection('sideheader'); ?>
                  <?php echo $__env->yieldSection(); ?>
              </div>
              <?php $__env->startSection('sidemenu'); ?>
              <?php echo $__env->yieldSection(); ?>

        </div>

         <div class="sidebar-menu col-md-9">
            <?php $__env->startSection('workspace'); ?> 
            <?php echo $__env->yieldSection(); ?>
        </div>
      </div>
    <br><br><br><br>
    <footer class="footer navbar-fixed-bottom">
      <div class="container">
           <p class="text-muted">CPSU - COAS V.1.0 is built through O-S Technology, a Shukerz-Based product. Copyright © 2023 CPSU, All Rights Reserved.</p>
      </div>
    </footer>
    <script src="<?php echo e(asset('bootstrap/js/jquery-1.12.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app.js')); ?>"></script>
    <?php $__env->startSection('script'); ?>
    <?php echo $__env->yieldSection(); ?>
  </body>
</html>

<?php /**PATH E:\Devs\coas\resources\views/layouts/master.blade.php ENDPATH**/ ?>