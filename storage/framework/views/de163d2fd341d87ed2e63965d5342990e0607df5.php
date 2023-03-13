

<?php $__env->startSection('title'); ?>
COAS - V1.0 || Admission
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideheader'); ?>
<h4>Admission</h4>
<?php $__env->stopSection(); ?>


<?php echo $__env->yieldContent('sidemenu'); ?>

<?php echo $__env->yieldContent('workspace'); ?>

<?php echo $__env->make('layouts.master_admission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devs\coas\resources\views/admission/index.blade.php ENDPATH**/ ?>