

<?php $__env->startSection('title'); ?>
COAS - V1.0 || Applicant Image
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideheader'); ?>
<h4>Admission</h4>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('sidemenu'); ?>


<?php $__env->startSection('workspace'); ?>
<ol class="breadcrumb">
        <li>Admission</li>
        <li><?php echo e($applicant->admission_id); ?></li>
        <li><?php echo e(ucwords(strtolower($applicant->fname))); ?> <?php echo e(ucwords($applicant->mname[0])); ?>. <?php echo e(ucwords(strtolower($applicant->lname))); ?></li>
        <li class="active">Capture Image</li>
    </ol>
    <div class="container-fluid">
    <div class="row">
    <p><?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
      <?php elseif(Session::has('fail')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>  
    <?php endif; ?></p>

    <form method="POST" action="<?php echo e(route('applicant_save_image', $applicant->id)); ?>">
    <?php echo csrf_field(); ?>
    <div class="row col-md-6">
    	<label>Camera</label>
    	<div id="coas_camera" class="coas_camera"></div>
    	<input type=button class="capture_snapshot btn btn-danger" value="Capture Snapshot" onClick="capture_snapshot()">
        <input type="hidden" name="image" class="image-tag">
	</div>
	
	<div class="row col-md-6">
		<label>Result</label>
		<div id="results" class="coas_camera_result"></div>
		<?php echo e(csrf_field()); ?>

        <button class="capture_snapshot btn btn-success">Submit</button>
	</div>
    </form>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('bootstrap/js/webcam.min.js')); ?>"></script>   
<script language="JavaScript">
     Webcam.set({
         width: 320,
         height: 240,
         image_format: 'jpeg',
         jpeg_quality: 90
     });
    Webcam.attach('#coas_camera');

    function capture_snapshot() {
       Webcam.snap( function(data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        });
    }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_admission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Devs\coas\resources\views/admission/applicant/capture_image.blade.php ENDPATH**/ ?>