

<?php $__env->startSection('title'); ?>
COAS - V1.0 || Pre-Enrolment Form
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideheader'); ?>
<h4>Admission</h4>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('sidemenu'); ?>

<?php $__env->startSection('workspace'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Admission</li>
        <li><?php echo e($examinee->admission_id); ?></li>
        <li><?php echo e(ucwords(strtolower($examinee->fname))); ?> <?php echo e(ucwords($examinee->mname[0])); ?>. <?php echo e(ucwords(strtolower($examinee->lname))); ?></li>
        <li class="active">Print | Download</li>
    </ol>
    <div class="container-fluid">
    <div class="row">
    <p><?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
      <?php elseif(Session::has('fail')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>  
    <?php endif; ?></p>

    <div class="container-fluid">
        <iframe src="<?php echo e(route('genPreEnrolment', $examinee->id)); ?>" width="100%" height="800"></iframe>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master_admission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/admission/examinee/printPreEnrolmentView.blade.php ENDPATH**/ ?>