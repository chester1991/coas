

<?php $__env->startSection('title'); ?>
COAS - V1.0 || Pre-Enrolment
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideheader'); ?>
<h4>Admission</h4>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('sidemenu'); ?>


<?php $__env->startSection('workspace'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Examinee Result</li>
        <li><?php echo e($applicant->admission_id); ?></li>
        <li><?php echo e(ucwords(strtolower($applicant->fname))); ?> <?php echo e(ucwords($applicant->mname[0])); ?>. <?php echo e(ucwords(strtolower($applicant->lname))); ?></li>
        <li class="active">Pre-Enrolment</li>
    </ol>
    <div class="container-fluid">
    <div class="row">
    <p><?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
      <?php elseif(Session::has('fail')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>  
    <?php endif; ?></p>

    <form method="POST" action="<?php echo e(route('save_applicant_rating', $applicant->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
      
      <div class="container-fluid">
      </div>

      <div class="page-header" style="margin-top: 0px;">
        <h4>Assign Result</h4>
      </div>
       <div class="col-md-3" <?php echo e(($errors->has('rating')) ? 'has-error' : ''); ?>>
        <label><span class="label label-default">Rating</span></label>
        <input type="number" class="form-control" name="rating" value="<?php echo e($applicant->interview->rating); ?>">
        <?php if($errors->has('rating')): ?>
      <span class="label label-danger"><?php echo e($errors->first('rating')); ?></span>
      <?php endif; ?>
      </div>
      <div class="col-md-4" <?php echo e(($errors->has('remarks')) ? 'has-error' : ''); ?>>
        <label><span class="label label-default">Remarks</span></label>
        <select class="level form-control" name="remarks">
        <option value="<?php echo e($applicant->interview->remarks); ?>"><?php if($applicant->interview->remarks == 1): ?> Accepted for Enrolment <?php else: ?> Not Accepted for Enrolment <?php endif; ?></option>
        <option value="1">Accepted for Enrolment</option>
        <option value="2">Not Accepted for Enrolment</option>
      </select>
      <?php if($errors->has('remarks')): ?>
      <span class="label label-danger"><?php echo e($errors->first('remarks')); ?></span>
      <?php endif; ?>
      </div>
      <div class="col-md-5" <?php echo e(($errors->has('course')) ? 'has-error' : ''); ?>>
        <label><span class="label label-default">Course</span></label>
        <select class="form-control" name="course">
          <option value="<?php echo e($applicant->interview->course); ?>"><?php echo e($applicant->interview->course); ?></option>
          <option value="BSIT" <?php if(old('course') == "BSIT"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Information Technology</option>
          <option value="BSCrim" <?php if(old('course') == "BSCrim"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science  in Criminology</option>
          <option value="BSHM" <?php if(old('course') == "BSHM"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science  in Hospitality Management</option>
          <option value="BSAGRI-Cs" <?php if(old('course') == "BSAGRI-Cs"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Agriculture major in Crop Science</option>
          <option value="BSAGRI-As" <?php if(old('course') == "BSAGRI-As"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Agriculture major in Animal Science</option>
          <option value="BSF" <?php if(old('course') == "BSF"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Forestry</option>
          <option value="BST" <?php if(old('course') == "BST"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor in Sugar Technology</option>
          <option value="BED - GE" <?php if(old('course') == "BED - GE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Elementary Education major in General Education</option>
          <option value="BSED - English" <?php if(old('course') == "BSED - English"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in English</option>
          <option value="BSED - Filipino" <?php if(old('course') == "BSED - Filipino"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in Filipino</option>
          <option value="BSED - Mathematics" <?php if(old('course') == "BSED - Mathematics"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in Mathematics</option>
          <option value="BSED - Science" <?php if(old('course') == "BSED - Science"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in Science</option>
          <option value="BASS" <?php if(old('course') == "BASS"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Arts major in Social Science</option>
          <option value="BSABE" <?php if(old('course') == "BSABE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Agricultural and Biosystems Engineering</option>
          <option value="BSEE" <?php if(old('course') == "BSEE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Electrical Engineering</option>
          <option value="BSME" <?php if(old('course') == "BSME"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Mechanical Engineering</option>
        </select>
        <?php if($errors->has('course')): ?>
        <span class="label label-danger"><?php echo e($errors->first('course')); ?></span>
        <?php endif; ?>
      </div>
      <div class="col-md-12" <?php echo e(($errors->has('reason')) ? 'has-error' : ''); ?>>
        <label><span class="label label-default">Reason</span></label>
        <textarea class="form-control" name="reason" rows="4" cols="50" value=""><?php echo e($applicant->interview->reason); ?></textarea>
      <?php if($errors->has('reason')): ?>
      <span class="label label-danger"><?php echo e($errors->first('reason')); ?></span>
      <?php endif; ?>
      </div>
      <div class="container-fluid">
      </div>
      <div class="modal-footer text-center" style="border:0px">
          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-danger">Save Rating</button>
          </div>
      </div>
    </form>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_admission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Devs\coas\resources\views/admission/conapp/deptInterview.blade.php ENDPATH**/ ?>