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

  <?php $__env->startSection('style'); ?>
    <style type="text/css">
    .tableFixHead {overflow-y: auto;height: 700px;}
    .tableFixHead thead th {position: relative;top: 0px;}
    th,td {padding: 8px 16px;border: 1px solid #ccc;}
    th {background: #eee;}
    .dataTables_filter {float: center !important;margin-top: -50px;}
    .dateFilter{position:absolute;font-size: 10px;color:#d9534f;}
    </style>
  <?php echo $__env->yieldSection(); ?>

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
              <?php if(Auth::user()->isAdmin == 0 || Auth::user()->isAdmin == 1 || Auth::user()->isAdmin == 2): ?>
              <ul class="list-group">
                  <a href="<?php echo e(route('applicant-add')); ?>" class="list-group-item">Add Applicants</a>
                  <a href="<?php echo e(route('applicant-list')); ?>" class="list-group-item">Applicants</a>  
                  <a href="<?php echo e(route('examinee-list')); ?>" class="list-group-item">List of Examinees</a>
                  <a href="<?php echo e(route('result-list')); ?>" class="list-group-item">Examination Results</a>
                  <a href="<?php echo e(route('examinee-confirm')); ?>" class="list-group-item">Confirmed/Unconfirmed Applicants</a>  
                  <a href="<?php echo e(route('applicant-accepted')); ?>" class="list-group-item">Accepted Applicants</a>
              </ul>
              <div class="page-header">
                  Reporting
              </div>
                <ul class="list-group">
                    <a href="<?php echo e(route('applicant_printing')); ?>" class="list-group-item">Applicants</a>
                    <a href="<?php echo e(route('examination_printing')); ?>" class="list-group-item">Examination Results</a>
                    <a href="<?php echo e(route('qualified_printing')); ?>" class="list-group-item">List of Qualified Applicants</a>
                    <a href="<?php echo e(route('accepted_printing')); ?>" class="list-group-item">List of Accepted Applicants</a>
                </ul>
              <?php elseif(Auth::user()->isAdmin == 5 || Auth::user()->isAdmin == 6 || Auth::user()->isAdmin == 7): ?>
              <ul class="list-group">
                  <a href="<?php echo e(route('result-list')); ?>" class="list-group-item">Examination Results</a>
                  <a href="<?php echo e(route('examinee-confirm')); ?>" class="list-group-item">Confirmed/Unconfirmed Applicants</a>  
                  <a href="<?php echo e(route('applicant-accepted')); ?>" class="list-group-item">Accepted Applicants</a>
              </ul>
              <?php endif; ?>
                <div class="page-header">
                  CPSU - COAS V.1.0
              </div>
              <?php echo $__env->yieldSection(); ?>
        </div>

         <div class="sidebar-menu col-md-9">
          <?php $__env->startSection('workspace'); ?>
          <ol class="breadcrumb">
              <li><a href="<?php echo e(route('home')); ?>" class="list-group-item glyphicon glyphicon-home"></a></li>
              <li>Admission</li>
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
    <script type="text/javascript">
    (() => {
        let year_satart = (new Date).getFullYear();
        let year_end = 2030;
        let year_selected = (new Date).getFullYear();
        let option = '';
        option = '<option value="">Year</option>';
        for (let i = year_satart; i <= year_end; i++) {
            let selected = (i === year_selected ? ' selected' : '');
            option += '<option value="' + i + '"' + selected + '>' + i + '</option>';
        }
        document.getElementById("year").innerHTML = option;
    })();

    $(document).ready(function() {
      $('#applicant-list').DataTable( {
          "ordering": false,
          bInfo: false,
          scrollY: '700px', scrollCollapse: true, paging: false,
      });
    });

    $(document).ready(function() {
        $('#applicant-reports').DataTable( {
            "ordering": false,
            bFilter: false, 
            bInfo: false,
            scrollY: '700px', scrollCollapse: true, paging: false,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        });
    });
    </script>
    <?php echo $__env->yieldSection(); ?>
  </body>

  <?php $__env->startSection('modal'); ?>
  <!-- Start Applicant -->
  <div class="modal fade bs-example-modal-sm" id="info_app" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
             </button>
             <h4 class="modal-title">Select Transaction</h4>
            </div>
            <div class="modal-body">
              <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-pencil" id="btn_edit_applicant"></a> Edit Application Data</p>
              <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-time" id="btn_schedule_applicant"></a> Schedule Examination Date</p>
              <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-print" id="btn_view_applicant"></a> View/Print Applicant Data</p>
              <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-camera" id="btn_capture_image"></a> Capture Applicant Image</p>
              <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-check" id="btn_confirm_applicant"></a> Push Applicant</p>
              <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-trash" id="btn_delete_applicant"></a> Remove Applicant</p> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
        </div>
  </div> 
  <!-- End  Applicant -->

  <!-- Start Examinee -->
    <div class="modal fade bs-example-modal-sm" id="info_examinee" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
               </button>
               <h4 class="modal-title">Select Transaction</h4>
              </div>
              <div class="modal-body">
                <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-pencil" id="btn_edit_examinee"></a> Edit Examinee Data</p>
                <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-stats" id="btn_test_result"></a> Assign Test Result</p>
                <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-print" id="btn_view_applicant"></a> View/Print Examinee Data</p>
                <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-camera" id="btn_capture_image"></a> Capture Examinee Image</p>
                <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-check" id="btn_confirm_examinee"></a> Push Examinee</p>
                <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-trash" id="btn_delete_examinee"></a> Remove Examinee</p>    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
          </div>
    </div> 
  <!-- End Examinee -->

  <!-- Start Examinee Results -->
    <div class="modal fade bs-example-modal-sm" id="info_results" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
               </button>
               <h4 class="modal-title">Select Transaction</h4>
              </div>
              <div class="modal-body">
                <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-stats" id="btn_test_result"></a> Update Test Result</p>
                <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-print" id="btn_view_preenrolment"></a> Generate Pre-Enrollment</p>
                <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-camera" id="btn_capture_image"></a> Capture Applicant Image</p>
                <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-check" id="btn_confirm_pre_enrolment"></a> Confirm for Pre-Enrolment</p>    
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
          </div>
    </div> 
    <!-- End Examinee Results -->

  <!-- Start Applicant -->
  <div class="modal fade bs-example-modal-sm" id="tab_info_app" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
           </button>
           <h4 class="modal-title">Are you sure to push this applicant?</h4>
          </div>
          <div class="modal-body">

            <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-check" id="btn_confirm_applicant"></a> Push Applicant</p>     
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
  </div> 
  <!-- End  Applicant -->

    <!-- StartExaminee -->
  <div class="modal fade bs-example-modal-sm" id="tab_info_examinee" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
           </button>
           <h4 class="modal-title">Are you sure to push this examinee?</h4>
          </div>
          <div class="modal-body">

            <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-check" id="btn_confirm_examinee"></a> Push Examinee</p>     
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
  </div> 
  <!-- End Examinee -->
  <?php echo $__env->yieldSection(); ?>

</html>

<?php /**PATH C:\xampp\htdocs\resources\views/layouts/master_admission.blade.php ENDPATH**/ ?>