

<?php $__env->startSection('title'); ?>
COAS - V1.0 || Admission
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideheader'); ?>
<h4>Admission</h4>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('sidemenu'); ?>


<?php $__env->startSection('workspace'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Admission</li>
        <li><?php echo e($applicant->admission_id); ?></li>
        <li><?php echo e(ucwords(strtolower($applicant->fname))); ?> <?php echo e(ucwords($applicant->mname[0])); ?>. <?php echo e(ucwords(strtolower($applicant->lname))); ?></li>
        <li class="active">Edit Data</li>
    </ol>
    <div class="container-fluid">
    <div class="row">
    <p><?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
      <?php elseif(Session::has('fail')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>  
    <?php endif; ?></p>

    <form method="POST" action="<?php echo e(route('applicant_update', $applicant->id)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

      <div class="page-header" style="margin-top: 0px;">
        <h4>Applicant Information</h4>
      </div>
      <div class="col-md-2">
        <label><span class="label label-default">Admission No.</span></label>
        <input type="text" class="form-control" name="admissionid" value="<?php echo e($applicant->admission_id); ?>" disabled>
      </div>
       <div class="col-md-2" <?php echo e(($errors->has('type')) ? 'has-error' : ''); ?>>
        <label><span class="label label-default">Admission Type</span></label>
        <select class="form-control" name="type">
          <option value="<?php echo e($applicant->type); ?>"><?php if($applicant->type == 1): ?> New <?php elseif($applicant->type == 2): ?> Returnee <?php elseif($applicant->type == 3): ?> Transferee <?php endif; ?></option>
          <option value="1" <?php if(old('type') == 1): ?> <?php echo e('selected'); ?> <?php endif; ?>>New</option>
          <option value="2" <?php if(old('type') == 2): ?> <?php echo e('selected'); ?> <?php endif; ?>>Returnee</option>
          <option value="3" <?php if(old('type') == 3): ?> <?php echo e('selected'); ?> <?php endif; ?>>Transferee</option>
        </select>
        <?php if($errors->has('type')): ?>
        <span class="label label-danger"><?php echo e($errors->first('type')); ?></span>
        <?php endif; ?>
      </div>
      <div class="col-md-3" <?php echo e(($errors->has('lname')) ? 'has-error' : ''); ?>>
          <label><span class="label label-default">Lastname</span></label>
          <input type="text" style="text-transform: uppercase;"  name="lname" class="form-control" value="<?php echo e($applicant->lname); ?>">
      </div>
      <div class="col-md-3">
            <label><span class="label label-default">Firstname<span></label>
            <input type="text" style="text-transform: uppercase;"  name="fname" class="form-control" value="<?php echo e($applicant->fname); ?>">
      </div>
      <div class="col-md-2">
        <label><span class="label label-default">Middlename<span></label>
        <input type="text" style="text-transform: uppercase;"  name="mname" class="form-control" value="<?php echo e($applicant->mname); ?>">
      </div>
      <div class="col-md-2">
      <label><span class="label label-default">Ext.<span></label>
      <select class="form-control" name="ext">
          <option value="<?php echo e($applicant->ext); ?>"><?php echo e($applicant->ext); ?></option>
          <option value=" " <?php if(old('ext') == " "): ?> <?php echo e('selected'); ?> <?php endif; ?>>N/A</option>
          <option value="Jr." <?php if(old('ext') == "Jr."): ?> <?php echo e('selected'); ?> <?php endif; ?>>Jr.</option>
          <option value="Sr." <?php if(old('ext') == "Sr."): ?> <?php echo e('selected'); ?> <?php endif; ?>>Sr.</option> 
        </select>
      </div>
      <div class="col-md-2" <?php echo e(($errors->has('gender')) ? 'has-error' : ''); ?>>
      <label><span class="label label-default">Gender<span></label>
        <select class="form-control" name="gender">
          <option value="<?php echo e($applicant->gender); ?>"><?php echo e($applicant->gender); ?></option>
          <option value="Male" <?php if(old('gender') == "Male"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Male</option>
          <option value="Female" <?php if(old('gender') == "Female"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Female</option>
        </select>
        <?php if($errors->has('gender')): ?>
        <span class="label label-danger"><?php echo e($errors->first('gender')); ?></span>
        <?php endif; ?>
      </div>
      <div class="col-md-2">
        <label><span class="label label-default">Date of Birth <span>(d/m/y)</span></label>
        <input type="date" class="form-control" name="bday" value="<?php echo e($applicant->bday); ?>">
      </div>
      <div class="col-md-2" <?php echo e(($errors->has('age')) ? 'has-error' : ''); ?>>
      <label><span class="label label-default">Age</span></label>
      <select class="form-control" name="age">
          <option value="<?php echo e($applicant->age); ?>"><?php echo e($applicant->age); ?></option>
          <option value="16" <?php if(old('age') == "16"): ?> <?php echo e('selected'); ?> <?php endif; ?>>16</option>
          <option value="17" <?php if(old('age') == "17"): ?> <?php echo e('selected'); ?> <?php endif; ?>>17</option>
          <option value="18" <?php if(old('age') == "18"): ?> <?php echo e('selected'); ?> <?php endif; ?>>18</option>
          <option value="19" <?php if(old('age') == "19"): ?> <?php echo e('selected'); ?> <?php endif; ?>>19</option>
          <option value="20" <?php if(old('age') == "20"): ?> <?php echo e('selected'); ?> <?php endif; ?>>20</option>
          <option value="21" <?php if(old('age') == "21"): ?> <?php echo e('selected'); ?> <?php endif; ?>>21</option>
          <option value="22" <?php if(old('age') == "22"): ?> <?php echo e('selected'); ?> <?php endif; ?>>22</option>
          <option value="23" <?php if(old('age') == "23"): ?> <?php echo e('selected'); ?> <?php endif; ?>>23</option>
          <option value="24" <?php if(old('age') == "24"): ?> <?php echo e('selected'); ?> <?php endif; ?>>24</option>
          <option value="25" <?php if(old('age') == "25"): ?> <?php echo e('selected'); ?> <?php endif; ?>>25</option>
          <option value="26" <?php if(old('age') == "26"): ?> <?php echo e('selected'); ?> <?php endif; ?>>26</option>
          <option value="27" <?php if(old('age') == "27"): ?> <?php echo e('selected'); ?> <?php endif; ?>>27</option>
          <option value="28" <?php if(old('age') == "28"): ?> <?php echo e('selected'); ?> <?php endif; ?>>28</option>
          <option value="29" <?php if(old('age') == "29"): ?> <?php echo e('selected'); ?> <?php endif; ?>>29</option>
          <option value="30" <?php if(old('age') == "30"): ?> <?php echo e('selected'); ?> <?php endif; ?>>30</option>
          <option value="31" <?php if(old('age') == "31"): ?> <?php echo e('selected'); ?> <?php endif; ?>>31</option>
          <option value="32" <?php if(old('age') == "32"): ?> <?php echo e('selected'); ?> <?php endif; ?>>32</option>
          <option value="33" <?php if(old('age') == "33"): ?> <?php echo e('selected'); ?> <?php endif; ?>>33</option>
          <option value="34" <?php if(old('age') == "34"): ?> <?php echo e('selected'); ?> <?php endif; ?>>34</option>
          <option value="35" <?php if(old('age') == "35"): ?> <?php echo e('selected'); ?> <?php endif; ?>>35</option>
          <option value="36" <?php if(old('age') == "36"): ?> <?php echo e('selected'); ?> <?php endif; ?>>36</option>
          <option value="37" <?php if(old('age') == "37"): ?> <?php echo e('selected'); ?> <?php endif; ?>>37</option>
          <option value="38" <?php if(old('age') == "38"): ?> <?php echo e('selected'); ?> <?php endif; ?>>38</option>
          <option value="39" <?php if(old('age') == "39"): ?> <?php echo e('selected'); ?> <?php endif; ?>>39</option>
          <option value="40" <?php if(old('age') == "40"): ?> <?php echo e('selected'); ?> <?php endif; ?>>40</option>
          <option value="41" <?php if(old('age') == "41"): ?> <?php echo e('selected'); ?> <?php endif; ?>>41</option>
          <option value="42" <?php if(old('age') == "42"): ?> <?php echo e('selected'); ?> <?php endif; ?>>42</option>
          <option value="43" <?php if(old('age') == "43"): ?> <?php echo e('selected'); ?> <?php endif; ?>>43</option>
          <option value="44" <?php if(old('age') == "44"): ?> <?php echo e('selected'); ?> <?php endif; ?>>44</option>
          <option value="45" <?php if(old('age') == "45"): ?> <?php echo e('selected'); ?> <?php endif; ?>>45</option>
          <option value="46" <?php if(old('age') == "46"): ?> <?php echo e('selected'); ?> <?php endif; ?>>46</option>
          <option value="47" <?php if(old('age') == "47"): ?> <?php echo e('selected'); ?> <?php endif; ?>>47</option>
          <option value="48" <?php if(old('age') == "48"): ?> <?php echo e('selected'); ?> <?php endif; ?>>48</option>
          <option value="49" <?php if(old('age') == "49"): ?> <?php echo e('selected'); ?> <?php endif; ?>>49</option>
          <option value="50" <?php if(old('age') == "46"): ?> <?php echo e('selected'); ?> <?php endif; ?>>50</option>
          <option value="51" <?php if(old('age') == "51"): ?> <?php echo e('selected'); ?> <?php endif; ?>>51</option>
          <option value="52" <?php if(old('age') == "52"): ?> <?php echo e('selected'); ?> <?php endif; ?>>52</option>
          <option value="53" <?php if(old('age') == "53"): ?> <?php echo e('selected'); ?> <?php endif; ?>>53</option>
          <option value="54" <?php if(old('age') == "54"): ?> <?php echo e('selected'); ?> <?php endif; ?>>54</option>
          <option value="55" <?php if(old('age') == "55"): ?> <?php echo e('selected'); ?> <?php endif; ?>>55</option>
          <option value="56" <?php if(old('age') == "56"): ?> <?php echo e('selected'); ?> <?php endif; ?>>56</option>
          <option value="57" <?php if(old('age') == "57"): ?> <?php echo e('selected'); ?> <?php endif; ?>>57</option>
          <option value="58" <?php if(old('age') == "58"): ?> <?php echo e('selected'); ?> <?php endif; ?>>58</option>
          <option value="59" <?php if(old('age') == "59"): ?> <?php echo e('selected'); ?> <?php endif; ?>>59</option>
          <option value="60" <?php if(old('age') == "46"): ?> <?php echo e('selected'); ?> <?php endif; ?>>60</option>
        </select>
        <?php if($errors->has('age')): ?>
        <span class="label label-danger"><?php echo e($errors->first('age')); ?></span>
        <?php endif; ?>
      </div>
      <div class="col-md-2">
        <label><span class="label label-default">Contact #<span></label>
        <input type="tel" class="form-control" name="contact" value="<?php echo e($applicant->contact); ?>">
      </div>
      <div class="col-md-2">
        <label><span class="label label-default">Email Address<span></label>
        <input type="email" class="form-control" name="email" value="<?php echo e($applicant->email); ?>"/>
      </div>
      <div class="col-md-12" <?php echo e(($errors->has('address')) ? 'has-error' : ''); ?>>
        <label><span class="label label-default">Address</span></label>
        <input type="text" name="address" class="form-control" value="<?php echo e($applicant->address); ?>">
        <?php if($errors->has('address')): ?>
        <span class="label label-danger"><?php echo e($errors->first('address')); ?></span>
        <?php endif; ?>
      </div>

      <div class="container-fluid">
      </div>

      <div class="page-header" style="margin-top: 0px;">
        <h4>For New Student</h4>
      </div>

      <div class="col-md-6">
        <label><span class="label label-default">Last School Attended<span></label>
        <input type="text" style="text-transform: uppercase;" name="lstsch_attended" class="form-control" value="<?php echo e($applicant->lstsch_attended); ?>">
      </div>

      <div class="col-md-6">
        <label><span class="label label-default">Strand<span></label>
        <select class="level form-control" name="strand">
        <option value="<?php echo e($applicant->strand); ?>"><?php echo e($applicant->strand); ?></option>
        <option value="BAM" <?php if(old('strand') == "BAM"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Business, Accountancy, Management (BAM)</option>
        <option value="HESS" <?php if(old('strand') == "HESS"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Humanities, Education, Social Sciences (HESS)</option>
        <option value="STEM" <?php if(old('strand') == "STEM"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Science, Technology, Engineering, Mathematics (STEM)</option>
      </select>
      </div>

      <div class="container-fluid">
      </div>
      <div class="page-header" style="margin-top: 0px;">
          <h4>For Transferee</h4>
      </div>

      <div class="col-md-6">
        <label><span class="label label-default">College/University last attended<span></label>
        <input type="text" style="text-transform: uppercase;" name="suc_lst_attended" class="form-control" value="<?php echo e($applicant->suc_lst_attended); ?>">
      </div>

      <div class="col-md-6" <?php echo e(($errors->has('course')) ? 'has-error' : ''); ?>>
        <label><span class="label label-default">Course</span></label>
        <select class="form-control" name="course">
          <option value="<?php echo e($applicant->course); ?>"><?php echo e($applicant->course); ?></option>
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

      <div class="container-fluid">
      </div>
      <div class="page-header" style="margin-top: 0px;">
        <h4>Course Preferences</h4>
      </div>

      <div class="col-md-12">
        <label><span class="label label-default">Course Preference #1<span></label>
        <select class="form-control" name="preference_1">
          <option value="<?php echo e($applicant->preference_1); ?>"><?php echo e($applicant->preference_1); ?></option>
          <option value="BSIT" <?php if(old('preference_1') == "BSIT"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Information Technology</option>
          <option value="BSCrim" <?php if(old('preference_1') == "BSCrim"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science  in Criminology</option>
          <option value="BSHM" <?php if(old('preference_1') == "BSHM"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science  in Hospitality Management</option>
          <option value="BSAGRI-Cs" <?php if(old('preference_1') == "BSAGRI-Cs"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Agriculture major in Crop Science</option>
          <option value="BSAGRI-As" <?php if(old('preference_1') == "BSAGRI-As"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Agriculture major in Animal Science</option>
          <option value="BSF" <?php if(old('preference_1') == "BSF"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Forestry</option>
          <option value="BST" <?php if(old('preference_1') == "BST"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor in Sugar Technology</option>
          <option value="BED - GE" <?php if(old('preference_1') == "BED - GE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Elementary Education major in General Education</option>
          <option value="BSED - English" <?php if(old('preference_1') == "BSED - English"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in English</option>
          <option value="BSED - Filipino" <?php if(old('preference_1') == "BSED - Filipino"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in Filipino</option>
          <option value="BSED - Mathematics" <?php if(old('preference_1') == "BSED - Mathematics"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in Mathematics</option>
          <option value="BSED - Science" <?php if(old('preference_1') == "BSED - Science"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in Science</option>
          <option value="BASS" <?php if(old('preference_1') == "BASS"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Arts major in Social Science</option>
          <option value="BSABE" <?php if(old('preference_1') == "BSABE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Agricultural and Biosystems Engineering</option>
          <option value="BSEE" <?php if(old('preference_1') == "BSEE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Electrical Engineering</option>
          <option value="BSME" <?php if(old('preference_1') == "BSME"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Mechanical Engineering</option>
          <option value="BSME" <?php if(old('preference_1') == "BSME"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Mechanical Engineering</option>
        </select>
      </div>

      <div class="col-md-12">
        <label><span class="label label-default">Course Preference #2<span></label>
        <select class="form-control" name="preference_2">
          <option value="<?php echo e($applicant->preference_2); ?>"><?php echo e($applicant->preference_2); ?></option>
          <option value="BSIT" <?php if(old('preference_2') == "BSIT"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Information Technology</option>
          <option value="BSCrim" <?php if(old('preference_2') == "BSCrim"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science  in Criminology</option>
          <option value="BSHM" <?php if(old('preference_2') == "BSHM"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science  in Hospitality Management</option>
          <option value="BSAGRI-Cs" <?php if(old('preference_2') == "BSAGRI-Cs"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Agriculture major in Crop Science</option>
          <option value="BSAGRI-As" <?php if(old('preference_2') == "BSAGRI-As"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Agriculture major in Animal Science</option>
          <option value="BSF" <?php if(old('preference_2') == "BSF"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Forestry</option>
          <option value="BST" <?php if(old('preference_2') == "BST"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor in Sugar Technology</option>
          <option value="BED - GE" <?php if(old('preference_2') == "BED - GE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Elementary Education major in General Education</option>
          <option value="BSED - English" <?php if(old('preference_2') == "BSED - English"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in English</option>
          <option value="BSED - Filipino" <?php if(old('preference_2') == "BSED - Filipino"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in Filipino</option>
          <option value="BSED - Mathematics" <?php if(old('preference_2') == "BSED - Mathematics"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in Mathematics</option>
          <option value="BSED - Science" <?php if(old('preference_2') == "BSED - Science"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in Science</option>
          <option value="BASS" <?php if(old('preference_2') == "BASS"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Arts major in Social Science</option>
          <option value="BSABE" <?php if(old('preference_2') == "BSABE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Agricultural and Biosystems Engineering</option>
          <option value="BSEE" <?php if(old('preference_2') == "BSEE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Electrical Engineering</option>
          <option value="BSME" <?php if(old('preference_2') == "BSME"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Mechanical Engineering</option>
          <option value="BSME" <?php if(old('preference_2') == "BSME"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Mechanical Engineering</option>
        </select>
      </div>
      <div class="container-fluid">
      </div>
      <div class="page-header" style="margin-top: 0px;">
          <h4>Schedule of Examination</h4>
      </div>
       <div class="col-md-4">
        <label><span class="label label-default">Date of Admission Test</span></label>
        <input type="date" class="form-control" name="d_admission" value="<?php echo e($applicant->d_admission); ?>">
      </div>
      <div class="col-md-4">
        <label><span class="label label-default">Time</span></label>
        <input type="text" class="form-control" name="time" value="<?php echo e($applicant->time); ?>">
      </div>
      <div class="col-md-4">
        <label><span class="label label-default">Venue</span></label>
        <input type="text" class="form-control" name="venue" value="<?php echo e($applicant->venue); ?>">
      </div>

      <div class="container-fluid">
      </div>
      <div class="page-header" style="margin-top: 0px;">
          <h4>Available Documents</h4>
      </div>

      <div class="row">
        <div class="container-fluid">
            <div class="col-md-12">
                <input type="radio" name="r_card" value="Yes" <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(old('r_card', $doc->r_card) === 'Yes' ? 'checked' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> Yes
                <input type="radio" name="r_card" value="No" <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(old('r_card', $doc->r_card) === 'No' ? 'checked' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> No
              <label>| Report Card</label>
            </div>
            <div class="col-md-12">
                <input type="radio" name="g_moral" value="Yes" <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(old('g_moral', $doc->g_moral) === 'Yes' ? 'checked' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> Yes
                <input type="radio" name="g_moral" value="No" <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(old('g_moral', $doc->g_moral) === 'No' ? 'checked' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> No
              <label>| Certificate of Good Moral</label>
            </div>
            <div class="col-md-12">
                <input type="radio" name="b_cert" value="Yes" <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(old('b_cert', $doc->b_cert) === 'Yes' ? 'checked' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> Yes
                <input type="radio" name="b_cert" value="No" <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(old('b_cert', $doc->b_cert) === 'No' ? 'checked' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> No
              <label>| Birth Certificate</label>
            </div>
            <div class="col-md-12">
                <input type="radio" name="m_cert" value="Yes" <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(old('m_cert', $doc->m_cert) === 'Yes' ? 'checked' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> Yes
                <input type="radio" name="m_cert" value="No" <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(old('m_cert', $doc->m_cert) === 'No' ? 'checked' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> No
              <label>| Medical Certificate</label>
            </div>
            <div class="col-md-12">
                <input type="radio" name="t_record" value="Yes" <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(old('t_record', $doc->t_record) === 'Yes' ? 'checked' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> Yes
                <input type="radio" name="t_record" value="No" <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(old('t_record', $doc->t_record) === 'No' ? 'checked' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> No
              <label>| Transcript of Record (For transferees)</label>
            </div>
            <div class="col-md-12">
                <input type="radio" name="h_dismissal" value="Yes" <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(old('h_dismissal', $doc->h_dismissal) === 'Yes' ? 'checked' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> Yes
                <input type="radio" name="h_dismissal" value="No" <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(old('h_dismissal', $doc->h_dismissal) === 'No' ? 'checked' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>> No
              <label>| Honorable Dismissal (For transferees)</label>
            </div>
          </div>
        </div>

        <div class="modal-footer text-center">
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-danger">Update</button>
            </div>
        </div>
    </form>

    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_admission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Devs\coas\resources\views/admission/applicant/edit.blade.php ENDPATH**/ ?>