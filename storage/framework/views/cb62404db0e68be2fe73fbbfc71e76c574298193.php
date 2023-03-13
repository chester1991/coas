<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <a href="<?php echo e(route('applicant-add')); ?>" class="list-group-item">Add Applicants</a>
                    <a href="<?php echo e(route('applicant-list')); ?>" class="list-group-item">Applicants</a>  
                    <a href="#" class="list-group-item">List of Examinees</a>
                    <a href="#" class="list-group-item">Examination Results</a>
                    <a href="#" class="list-group-item">Confirmed/Unconfirmed Applicants</a>  
                    <a href="#" class="list-group-item">Qualified Applicants</a>
                    <a href="#" class="list-group-item">Accepted Applicants</a>
                </ul>
                <ul class="list-group">
                <a href="#submenu-1" class="list-group-item" data-toggle="collapse" data-target="#submenu-1">Applicant Report (Overall)</a>
                <ul id="submenu-1" class="list-group collapse">
                    <a href="<?php echo e(route('applicant-list')); ?>" class="list-group-item">Applicants</a>
                    <a href="#" class="list-group-item">Examination Results</a>
                    <a href="#" class="list-group-item">List of Accepted Applicants</a>
                    <a href="#" class="list-group-item">List of Qualified Applicants</a>
                    <a href="#" class="list-group-item">List of Accepted Applicants</a>
                </ul>
                </ul>
                <ul class="list-group">
                <a href="#"class="list-group-item">Admission Config</a>
                </ul>
              <?php echo $__env->yieldSection(); ?>

        </div>

         <div class="sidebar-menu col-md-9">
            <?php $__env->startSection('workspace'); ?>
              <?php if(Session::has('success')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                  <?php elseif(Session::has('fail')): ?>
                    <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div> 
              <?php endif; ?>
            <div class="workspace-top" style="text-align: center;">
              <h1 class="fas fa-mug-hot fa-7x"></h1>
              <h1><span style="color:#ffff66;font-size: 70px;">Eey!</span> Grab first a coffee before doing something.</h1>
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
    <footer class="footer">
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

<!-- Start Delete Applicant -->
<div class="modal fade bs-example-modal-sm" id="delete_app" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
           </button>
           <h4 class="modal-title">Delete Applicant</h4>
          </div>
          <div class="modal-body">
            <h5>Are you sure?</h5>
          </div>

          <div class="modal-footer">
            <a href="#" type="button" class="btn btn-danger" id="btn_delete_applicant">Delete</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
</div> 
<!-- End Delete Applicant -->

</html>

<?php /**PATH D:\devs\coas\resources\views/layouts/master_admission.blade.php ENDPATH**/ ?>