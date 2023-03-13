

<?php $__env->startSection('title'); ?>
COAS - V1.0 || Applicant List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideheader'); ?>
<h4>Admission</h4>
<?php $__env->stopSection(); ?>

<!-- Start Delete Applicant -->
<div class="modal fade bs-example-modal-sm" id="applicant_delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
           </button>
           <h4 class="modal-title">Delete Applicant</h4>
          </div>
          <div class="modal-body">
            <h5>Are you sure?</h5>
          </div>

          <div class="modal-footer">
            <a href="#" type="button" class="btn btn-danger" id="btn_delete_applicant">Delete</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
</div> 
<!-- End Delete Applicant -->

<?php echo $__env->yieldContent('sidemenu'); ?>

<?php $__env->startSection('workspace'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Admission</li>
        <li class="active">Applicant List</li>
    </ol>
    <div class="container-fluid">
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
                <option value="">Year</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
              </select>
            </div>
            <div class="col-md-2">
                <select class="form-control" name="campus">
                <option value="">Campus</option>
                <option value="Main Campus">Main</option>
                <option value="San Carlos Campus">San Carlos</option>
                <option value="Victorias Campus">Victorias</option>
                <option value="Hinigaran Campus">Hinigaran</option>
                <option value="Moises Padilla Campus">Moises Padilla</option>
                <option value="Hinobaan Campus">Hinobaan</option>
                <option value="Sipalay Campus">Sipalay</option>
                <option value="Ilog Campus">Ilog</option>
                <option value="Cauayan Campus">Cauayan</option>
              </select>
            </div>
            <div class="col-md-2">
              <input type="text" class="form-control" name="admission_id" placeholder="Applicant ID">
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
              <input type="text" class="form-control" name="lname" placeholder="Lastname">
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
      <h4>Search Results: 0</h4>
    </div>

    <div class="container-fluid">
      <div class="scrollme">
        <table class="table">  
          <thead>
                <tr>
                    <th>App ID</th>
                    <th>Name</th>
                    <th>Strand</th>
                    <th>Email</th>
                    <th>Contact #</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                </tr>      
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_admission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\devs\coas\resources\views/admission/applicant_list.blade.php ENDPATH**/ ?>