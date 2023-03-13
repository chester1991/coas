

<?php $__env->startSection('title'); ?>
COAS - V1.0 || Schedule Examination
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideheader'); ?>
<h4>Admission</h4>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('sidemenu'); ?>

<?php $__env->startSection('workspace'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Schedule Examination</li>
        <li><?php echo e($applicant->admission_id); ?></li>
        <li><?php echo e(ucwords(strtolower($applicant->fname))); ?> <?php echo e(ucwords($applicant->mname[0])); ?>. <?php echo e(ucwords(strtolower($applicant->lname))); ?></li>
        <li class="active">Schedule</li>
    </ol>
    <div class="container-fluid">
    <div class="row">
    <p><?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
      <?php elseif(Session::has('fail')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>  
    <?php endif; ?></p>

    <form method="POST" action="<?php echo e(route('applicant_schedule_save', $applicant->id)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
      
      <div class="container-fluid">
      </div>

      <div class="page-header" style="margin-top: 0px;">
        <h4>Schedule Examination</h4>
      </div>
       <div class="col-md-4">
        <label><span class="label label-default">Date of Admission Test</span></label>
        <input type="date" class="form-control" name="d_admission" value="<?php echo e($applicant->d_admission); ?>">
      </div>
      <div class="col-md-4">
        <label><span class="label label-default">Time</span></label>
        <input type="text" class="form-control" name="time" value="<?php echo e($applicant->time); ?>">
      </div>
      <div class="col-md-4">
        <label><span class="label label-default">Venue</span></label>
        <input type="text" class="form-control" name="venue" value="<?php echo e($applicant->venue); ?>">
      </div>
      <div class="container-fluid">
      </div>
      <div class="modal-footer text-center">
          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-danger">Schedule</button>
          </div>
      </div>
    </form>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_admission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Devs\coas\resources\views/admission/applicant/schedule.blade.php ENDPATH**/ ?>