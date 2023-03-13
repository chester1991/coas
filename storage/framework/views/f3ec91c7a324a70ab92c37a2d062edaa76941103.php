

<?php $__env->startSection('title'); ?>
COAS - V1.0 || Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideheader'); ?>
<h4>Home</h4>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidemenu'); ?>
    <h3  style="text-align: center;">Vision</h3>
    <p style="text-align: center;">CPSU as the leading technology-driven multi-disciplinary University by 2030.</p>
    <h3  style="text-align: center;">MISSION</h3>
    <p style="text-align: center;">CPSU is committed to produce competent graduates who can generate and extend leading technologies in multi-disciplinary areas beneficial to the community.</p>
    <h3  style="text-align: center;">GOAL</h3>
    <p style="text-align: center;">To provide efficient, Quality, Technology-driven and Gender-Sensitive Products abd Services.</p>
<?php $__env->stopSection(); ?>

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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devs\coas\resources\views/control/home.blade.php ENDPATH**/ ?>