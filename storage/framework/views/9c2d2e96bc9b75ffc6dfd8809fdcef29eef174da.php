

<?php $__env->startSection('title'); ?>
COAS - V1.0 || Print Applicant
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideheader'); ?>
<h4>Admission</h4>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('sidemenu'); ?>

<?php $__env->startSection('workspace'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Admission</li>
        <li>Print Reports</li>
        <li class="active">Print Applicant</li>
    </ol>
    <div class="row">
    <p><?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
      <?php elseif(Session::has('fail')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>  
    <?php endif; ?></p>

    <form method="GET" action="<?php echo e(route('srchappList')); ?>">
       <?php echo e(csrf_field()); ?>

        <div class="row"> 
          <div class="col-md-12">
            <div class="container-fluid">
            <div class="searchclub jumbotron">
            <div class="col-md-2">
              <select class="form-control" name="year">
                <option value="">All</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
              </select>
            </div>
            <div class="col-md-2">
                <select class="form-control" name="campus">
                <option value="">Campus</option>
                <option value="MC">Main</option>
                <option value="SCC">San Carlos</option>
                <option value="VC">Victorias</option>
                <option value="HC">Hinigaran</option>
                <option value="MP">Moises Padilla</option>
                <option value="HC">Hinobaan</option>
                <option value="SC">Sipalay</option>
                <option value="IC">Ilog</option>
                <option value="CC">Cauayan</option>
              </select>
            </div>
            <div class="col-md-2">
              <select class="form-control" name="strand">
                <option value="">Strand</option>
                <option value="BAM">BAM</option>
                <option value="HESS">HESS</option>
                <option value="STEM">STEM</option>
              </select>
            </div>
            <div class="col-md-2">
              <input type="date" class="form-control" name="min_date">
              <small class="dateFilter">Start Date</small>
            </div>
            <div class="col-md-2">
              <input type="date" class="form-control" name="max_date">
              <small class="">End Date</small>
            </div>
            <div class="col-md-2">
              <button type="submit" class="form-control btn btn-danger">Seach</button>
            </div>
            </div>
          </div>
          </div>
        </div>
    </form>

    <div class="container-fluid">
      <div class="scrollme">
        <table class="table">  
          <thead>
                <tr>
                    <th>App ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Email</th>
                    <th>Contact #</th>
                    <th>Date Applied</th>
                </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($applicant->admission_id); ?></td>
                  <td style="text-transform: uppercase;"><b><?php echo e($applicant->fname); ?> <?php echo e(substr($applicant->mname,0,1)); ?>. <?php echo e($applicant->lname); ?> <?php echo e($applicant->ext); ?></b></td>
                  <td><?php if($applicant->type == 1): ?> New <?php elseif($applicant->type == 2): ?> Returnee <?php elseif($applicant->type == 3): ?> Transferee <?php endif; ?></td>
                  <td><?php echo e($applicant->email); ?></td>
                  <td><?php echo e($applicant->contact); ?></td>
                  <td><?php echo e($applicant->created_at->format('m-d-Y')); ?></td>
                </tr> 
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
            </tbody>
          </table>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_admission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Devs\coas\resources\views/admission/applicant/appPrinting.blade.php ENDPATH**/ ?>