

<?php $__env->startSection('title'); ?>
COAS - V1.0 || Settings
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideheader'); ?>
<h4>Settings</h4>
<?php $__env->stopSection(); ?>


<?php echo $__env->yieldContent('sidemenu'); ?>


<?php echo $__env->make('layouts.master_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Devs\coas\resources\views/control/settings/index.blade.php ENDPATH**/ ?>