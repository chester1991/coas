

<?php $__env->startSection('title'); ?>
COAS - V1.0 || Applicant List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideheader'); ?>
<h4>Admission</h4>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('sidemenu'); ?>

<?php $__env->startSection('workspace'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Admission</li>
        <li class="active">Examinee List</li>
    </ol>
    <div class="row">
    <div class="container-fluid"><?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
      <?php elseif(Session::has('fail')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>  
    <?php endif; ?></div>
    <form method="GET" action="<?php echo e(route('srchexamineeList')); ?>">
       <?php echo e(csrf_field()); ?>

        <div class="row"> 
          <div class="col-md-12">
            <div class="container-fluid">
            <div class="searchclub jumbotron">
            <div class="col-md-2">
              <select class="form-control" name="year">
                <option value="">All</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
              </select>
            </div>
            <div class="col-md-2">
                <select class="form-control" name="campus">
                <option value="">Campus</option>
                <option value="MC">Main</option>
                <option value="SCC">San Carlos</option>
                <option value="VC">Victorias</option>
                <option value="HC">Hinigaran</option>
                <option value="MP">Moises Padilla</option>
                <option value="HC">Hinobaan</option>
                <option value="SC">Sipalay</option>
                <option value="IC">Ilog</option>
                <option value="CC">Cauayan</option>
              </select>
            </div>
            <div class="col-md-2">
              <input type="text" class="form-control" name="admission_id" placeholder="Applicant ID">
            </div>
            <div class="col-md-2">
              <select class="form-control" name="strand">
                <option value="">Strand</option>
                <option value="BAM">BAM</option>
                <option value="HESS">HESS</option>
                <option value="STEM">STEM</option>
              </select>
            </div>
            <div class="col-md-2">
              <input type="text" class="form-control" name="lname" placeholder="Lastname">
            </div>
            <div class="col-md-2">
              <button type="submit" class="form-control btn btn-danger">Seach</button>
            </div>
            </div>
          </div>
          </div>
        </div>
    </form>

    <div class="container-fluid"><h4>Search Results: <?php echo e($totalSearchResults); ?> <small><i>Year-<b><?php echo e(request('year')); ?></b>, Campus-<b><?php echo e(request('campus')); ?></b>, ID-<b><?php echo e(request('admission_id')); ?></b>,  Strand-<b><?php echo e(request('strand')); ?></b>, Lastname-<b><?php echo e(request('lname')); ?></b></i></small></h4>
    
    <table class="table">
       <thead>
                <tr>
                    <th>Examinee ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Email</th>
                    <th>Contact #</th>
                    <th>Date Applied</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($applicant->p_status == 2): ?> 
                <tr>
                  <td><?php echo e($applicant->admission_id); ?></td>
                  <td style="text-transform: uppercase;"><b><?php echo e($applicant->fname); ?> <?php echo e(substr($applicant->mname,0,1)); ?>. <?php echo e($applicant->lname); ?></b></td>
                  <td><?php if($applicant->type == 1): ?> New <?php else: ?> Transferee <?php endif; ?></td>
                  <td><?php echo e($applicant->email); ?></td>
                  <td><?php echo e($applicant->created_at); ?></td>
                  <td><?php echo e($applicant->d_admission); ?> : <?php echo e($applicant->time); ?></td>
                  <td>
                    <a data-toggle="tooltip" data-placement="bottom" title="Process Applicant"><i id="<?php echo e($applicant->id); ?>" data-toggle="modal" data-target="#info_app" class="btn btn-default info_applicant glyphicon glyphicon-info-sign"></i></a>

                  </td>
                </tr> 
                <?php else: ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </tbody>
          </table>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<!-- Start Delete Applicant -->
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
            <p><a href="#" type="button" class="btn btn-success glyphicon glyphicon-pencil" id="btn_edit_applicant"></a> Edit Application Data</p>
            <p><a href="#" type="button" class="btn btn-success glyphicon glyphicon-stats" id="btn_view_applicant"></a> Assign Test Result</p>
            <p><a href="#" type="button" class="btn btn-success glyphicon glyphicon-print" id="btn_view_applicant"></a> View/Print Applicant Data</p>
            <p><a href="#" type="button" class="btn btn-success glyphicon glyphicon-camera" id="btn_capture_image"></a> Capture Applicant Image</p>
            <p><a href="#" type="button" class="btn btn-danger glyphicon glyphicon-check" id="btn_confirm_applicant"></a> Push Examinee</p>
            <p><a href="#" type="button" class="btn btn-danger glyphicon glyphicon-trash" id="btn_delete_applicant"></a> Remove Applicant</p>    
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
</div> 
<!-- End Delete Applicant -->

<?php echo $__env->make('layouts.master_admission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Devs\coas\resources\views/admission/examinee_list_search.blade.php ENDPATH**/ ?>