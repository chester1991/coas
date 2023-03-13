

<?php $__env->startSection('title'); ?>
COAS - V1.0 || Examinee Result
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideheader'); ?>
<h4>Admission</h4>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('sidemenu'); ?>


<?php $__env->startSection('workspace'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Examinee Result</li>
        <li><?php echo e($assignresult->admission_id); ?></li>
        <li><?php echo e(ucwords(strtolower($assignresult->fname))); ?> <?php echo e(ucwords($assignresult->mname[0])); ?>. <?php echo e(ucwords(strtolower($assignresult->lname))); ?></li>
        <li class="active">Assign</li>
    </ol>
    <div class="container-fluid">
    <div class="row">
    <p><?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
      <?php elseif(Session::has('fail')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>  
    <?php endif; ?></p>

    <form method="POST" action="<?php echo e(route('examinee_result_save', $assignresult->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
      
      <div class="container-fluid">
      </div>

      <div class="page-header" style="margin-top: 0px;">
        <h4>Assign Result</h4>
      </div>
       <div class="col-md-4">
        <label><span class="label label-default">Raw Score</span></label>
        <input type="text" class="form-control" name="raw_score" value="<?php $__currentLoopData = $assign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($assign->raw_score); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
      </div>
      <div class="col-md-4">
        <label><span class="label label-default">Precentile</span></label>
        <input type="text" class="form-control" name="percentile" value="<?php $__currentLoopData = $per; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($per->percentile); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
      </div>
      <div class="container-fluid">
      </div>
      <div class="modal-footer text-center" style="border:0px">
          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-danger">Save</button>
          </div>
      </div>
    </form>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_admission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Devs\coas\resources\views/admission/examinee/result.blade.php ENDPATH**/ ?>