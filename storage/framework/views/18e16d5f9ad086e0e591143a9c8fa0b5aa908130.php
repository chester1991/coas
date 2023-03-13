

<?php $__env->startSection('title'); ?>
COAS - V1.0 || User List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideheader'); ?>
<h4>Settings</h4>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('sidemenu'); ?>

<?php $__env->startSection('workspace'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Settings</li>
        <li class="active">User List</li>
    </ol>
    <div class="row">
    <p><?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
      <?php elseif(Session::has('fail')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>  
    <?php endif; ?></p>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'excel', 'pdf', 'print'
          ]
      });
  });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/control/settings/usermasterList.blade.php ENDPATH**/ ?>