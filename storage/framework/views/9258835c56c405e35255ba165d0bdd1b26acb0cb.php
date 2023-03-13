

<?php $__env->startSection('title'); ?>
COAS - V1.0 || Settings
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideheader'); ?>
<h4>Settings</h4>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('style'); ?>

<?php echo $__env->yieldContent('sidemenu'); ?>

<?php $__env->startSection('workspace'); ?>
<ol class="breadcrumb">
  <li><a href="<?php echo e(route('home')); ?>" class="list-group-item glyphicon glyphicon-home"></a></li>
  <li>Settings</li>
</ol>
<?php if(Session::has('success')): ?>
    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
  <?php elseif(Session::has('fail')): ?>
    <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div> 
<?php endif; ?>

	<div class="col-md-5 jumbotron">
		<form method="POST" action="<?php echo e(route('changepassUpdate', $user->id)); ?>">
	      <?php echo e(csrf_field()); ?>

        <?php echo method_field('PUT'); ?>
	      <div class="page-header" style="margin-top: 0px;">
	        <h4>Change Password: <?php echo e($user->fname); ?> <?php echo e($user->mname); ?> <?php echo e($user->lname); ?></h4>
	     </div>

         <div class="col-md-12">
         <div class="form-group" <?php echo e(($errors->has('password')) ? 'has-error' : ''); ?>>
         <label><span class="label label-default">New Password</span></label>
         <input class="form-control" type="password" name="password" id="password" placeholder="Enter New Password">
            <?php if($errors->has('password')): ?>
          <?php echo e($errors->first('password')); ?>

            <?php endif; ?>
         </div>
        </div>

         <div class="col-md-12">
         <div class="form-group" <?php echo e(($errors->has('confirmation')) ? 'has-error' : ''); ?>>
         <label><span class="label label-default">Confirm Password</span></label>
         <input class="form-control" type="password" name="confirmation" id="confirmation" placeholder="Confirm New Password">
         <?php if($errors->has('confirmation')): ?>
          <?php echo e($errors->first('confirmation')); ?>

            <?php endif; ?>
         </div>
        </div>

        <div class="col-md-12">
            <div class="text-center">
              <button type="submit" class="col-md-12 btn btn-warning">Update Password</button>
            </div>
        </div>

	 	</form>
	</div>

	<div class="col-md-7">
		<div class="scrollme">
        <table id="userSettings" class="display nowrap" style="width:100%">
          <thead>
                <tr>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Campus</th>
                    <th>Office</th>
                    <th>Action</th>
                </tr>
            </thead>
             <tbody>
             	<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             		<tr>
             			<td><?php echo e($user->fname); ?> <?php echo e(substr($user->mname,0,1)); ?>. <?php echo e($user->lname); ?></td>
             			<td><?php if($user->isAdmin == 1): ?> Guidance Officer <?php elseif($user->isAdmin == 2): ?> Guidance Staff <?php elseif($user->isAdmin == 3): ?> Registrar <?php elseif($user->isAdmin == 4): ?> Registrar Staff <?php elseif($user->isAdmin == 5): ?> College Dean <?php elseif($user->isAdmin == 6): ?> Program Head <?php elseif($user->isAdmin == 7): ?> College Staff <?php endif; ?></td>
             			<td><?php if($user->campus == 'MC'): ?> Main <?php elseif($user->campus == 'SCC'): ?> San Carlos <?php elseif($user->campus == 'VC'): ?> Victorias <?php elseif($user->campus == 'HC'): ?> Hinigaran <?php elseif($user->campus == 'MP'): ?> Moises Padilla <?php elseif($user->campus == 'HinC'): ?> Hinobaan <?php elseif($user->campus == 'SC'): ?> Sipalay <?php elseif($user->campus == 'IC'): ?> Ilog <?php elseif($user->campus == 'CC'): ?> Cauayan <?php endif; ?></td>
             			<td><?php echo e($user->dept); ?></td>
             			<td style="text-align:center;">
                    	<a data-toggle="tooltip" data-placement="bottom" title="Process Applicant"><i id="<?php echo e($user->id); ?>" data-toggle="modal" data-target="#user_settings" class="btn btn-default settings">ii</i></a>
                  		</td>
                	</tr>   
             	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#userSettings').DataTable( {
        "ordering": false,
        scrollY: '420px', scrollCollapse: true, paging: false,
      });
  });
  </script>
<?php $__env->stopSection(); ?>


<!-- Start Configure Users -->
<div class="modal fade bs-example-modal-sm" id="user_settings" tabindex="-1" role="dialog" aria-hidden="true">
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
            <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-pencil" id="btn_edit_user"></a> Edit User Data</p>
            <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-lock" id="btn_changepass_user"></a> Change Password</p>
            <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-trash" id="btn_delete_user"></a> Remove User</p>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
</div> 
<!-- End Configure Users -->

<?php echo $__env->make('layouts.master_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/control/settings/changepass.blade.php ENDPATH**/ ?>