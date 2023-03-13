

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
       <div class="row"> 
          <div class="col-md-2">
            <label><span class="label label-default">Admission No.</span></label>
            <input type="text" class="form-control" name="admissionid" value="<?php echo e($applicant->admission_id); ?>" disabled>
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
          <div class="col-md-2">
          <label><span class="label label-default">Gender<span></label>
          <select class="form-control" name="gender">
              <option value="<?php echo e($applicant->gender); ?>"><?php echo e($applicant->gender); ?></option>
              <option value="Male" <?php if(old('gender') == "Male"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Male</option>
              <option value="Female" <?php if(old('gender') == "Female"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Female</option>
            </select>
          </div>
          <div class="col-md-3">
            <label><span class="label label-default">Date of Birth <span>(d/m/y)</span></label>
            <input type="date" class="form-control" name="bday" value="<?php echo e($applicant->bday); ?>">
          </div>
          <div class="col-md-5">
            <label><span class="label label-default">Place of Birth<span></label>
            <input type="text" style="text-transform: uppercase;"  name="pbirth" class="form-control" value="<?php echo e($applicant->pbirth); ?>">
          </div>
          <div class="col-md-2">
            <label><span class="label label-default">Contact #<span></label>
            <input type="tel" class="form-control" name="contact" value="<?php echo e($applicant->contact); ?>">
          </div>
          <div class="col-md-3">
            <label><span class="label label-default">Est. Annual Fam. Income<span></label>
            <input type="number" class="form-control" name="annual_income" placeholder="1000.00" value="<?php echo e($applicant->annual_income); ?>"/>
          </div>
          <div class="col-md-4">
            <label><span class="label label-default">Email Address<span></label>
            <input type="email" class="form-control" name="email" value="<?php echo e($applicant->email); ?>"/>
          </div>
          <div class="col-md-5">
          <label><span class="label label-default">Level/Degree<span></label>
          <select class="level form-control" name="level">
              <option value="<?php echo e($applicant->level); ?>"><?php echo e($applicant->level); ?></option>
              <option value="Graduate" <?php if(old('level') == "Graduate"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Graduate</option>
              <option value="Undergraduate" <?php if(old('level') == "Undergraduate"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Undergraduate</option>
              <option value="Transferee" <?php if(old('level') == "Transferee"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Transferee</option>
              <option value="SHS" <?php if(old('level') == "SHS"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Senior High School</option>
              <option value="HS" <?php if(old('level') == "HS"): ?> <?php echo e('selected'); ?> <?php endif; ?>>High School</option>
              <option value="ALS" <?php if(old('level') == "ALS"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Alternative Learning System (ALS)</option>
            </select>
          </div>
          </div>

          <div class="page-header" style="margin-top: 0px;">
            <h2><small>Home Address</small></h2>
          </div>

          <div class="row">
            <div class="col-md-4">
              <label><span class="label label-default">Home No.<span></label>
              <input type="text" style="text-transform: uppercase;"  name="hnum" class=" form-control" value="<?php echo e($applicant->hnum); ?>">
            </div>
            <div class="col-md-4">
              <label><span class="label label-default">Street/Barangay<span></label>
              <input type="text" style="text-transform: uppercase;"  name="brgy" class="form-control" value="<?php echo e($applicant->brgy); ?>">
            </div>
            <div class="col-md-4">
              <label><span class="label label-default">Municipality/ District/ City<span></label>
              <input type="text" style="text-transform: uppercase;" name="mdc" class="form-control" value="<?php echo e($applicant->mdc); ?>">
            </div>
            <div class="col-md-4">
              <label><span class="label label-default">Province<span></label>
              <select class="region form-control" name="province">
                <option value="<?php echo e($applicant->province); ?>"><?php echo e($applicant->province); ?></option>
                <option value="Abra" <?php if(old('province') == "Abra"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Abra</option>
                <option value="Agusan del Norte" <?php if(old('province') == "Agusan del Norte"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Agusan del Norte</option>
                <option value="Agusan del Sur" <?php if(old('province') == "Agusan del Sur"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Agusan del Sur</option>
                <option value="Aklan" <?php if(old('province') == "Aklan"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Aklan</option>
                <option value="Albay" <?php if(old('province') == "Albay"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Albay</option>
                <option value="Antique" <?php if(old('province') == "Antique"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Antique</option>
                <option value="Apayao" <?php if(old('province') == "Apayao"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Apayao</option>
                <option value="Aurora" <?php if(old('province') == "Aurora"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Aurora</option>
                <option value="Basilan" <?php if(old('province') == "Basilan"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Basilan</option>
                <option value="Bataan" <?php if(old('province') == "Bataan"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bataan</option>
                <option value="Batanes" <?php if(old('province') == "Batanes"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Batanes</option>
                <option value="Batangas" <?php if(old('province') == "Batangas"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Batangas</option>
                <option value="Benguet" <?php if(old('province') == "Benguet"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Benguet</option>
                <option value="Biliran" <?php if(old('province') == "Biliran"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Biliran</option>
                <option value="Bohol" <?php if(old('province') == "Bohol"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bohol</option>
                <option value="Bukidnon" <?php if(old('province') == "Bukidnon"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bukidnon</option>
                <option value="Bulacan" <?php if(old('province') == "Bulacan"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bulacan</option>
                <option value="Cagayan" <?php if(old('province') == "Cagayan"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Cagayan</option>
                <option value="Camarines Norte" <?php if(old('province') == "Camarines Norte"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Camarines Norte</option>
                <option value="Camarines Sur" <?php if(old('province') == "Camarines Sur"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Camarines Sur</option>
                <option value="Camiguin" <?php if(old('province') == "Camiguin"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Camiguin</option>
                <option value="Capiz" <?php if(old('province') == "Capiz"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Capiz</option>
                <option value="Catanduanes" <?php if(old('province') == "Catanduanes"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Catanduanes</option>
                <option value="Cavite" <?php if(old('province') == "Cavite"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Cavite</option>
                <option value="Cebu" <?php if(old('province') == "Cebu"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Cebu</option>
                <option value="Cotabato" <?php if(old('province') == "Cotabato"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Cotabato</option>
                <option value="Davao de Oro" <?php if(old('province') == "Davao de Oro"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Davao de Oro</option>
                <option value="Davao del Norte" <?php if(old('province') == "Davao del Norte"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Davao del Norte</option>
                <option value="Davao del Sur" <?php if(old('province') == "Davao del Sur"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Davao del Sur</option>
                <option value="Davao Occidental" <?php if(old('province') == "Davao Occidental"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Davao Occidental</option>
                <option value="Davao Oriental" <?php if(old('province') == "Davao Oriental"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Davao Oriental</option>
                <option value="Dinagat Islands" <?php if(old('province') == "Dinagat Islands"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Dinagat Islands</option>
                <option value="Eastern Samar" <?php if(old('province') == "Eastern Samar"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Eastern Samar</option>
                <option value="Guimaras" <?php if(old('province') == "Guimaras"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Guimaras</option>
                <option value="Ifugao" <?php if(old('province') == "Ifugao"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Ifugao</option>
                <option value="Ilocos Norte" <?php if(old('province') == "Ilocos Norte"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Ilocos Norte</option>
                <option value="Ilocos Sur" <?php if(old('province') == "Ilocos Sur"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Ilocos Sur</option>
                <option value="Iloilo" <?php if(old('province') == "Iloilo"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Iloilo</option>
                <option value="Isabela" <?php if(old('province') == "Isabela"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Isabela</option>
                <option value="Kalinga" <?php if(old('province') == "Kalinga"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Kalinga</option>
                <option value="La Union" <?php if(old('province') == "La Union"): ?> <?php echo e('selected'); ?> <?php endif; ?>>La Union</option>
                <option value="Laguna" <?php if(old('province') == "Laguna"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Laguna</option>
                <option value="Lanao del Norte" <?php if(old('province') == "Lanao del Norte"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Lanao del Norte</option>
                <option value="Lanao del Sur" <?php if(old('province') == "Lanao del Sur"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Lanao del Sur</option>
                <option value="Leyte" <?php if(old('province') == "Leyte"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Leyte</option>
                <option value="Maguindanao" <?php if(old('province') == "Maguindanao"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Maguindanao</option>
                <option value="Marinduque" <?php if(old('province') == "Marinduque"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Marinduque</option>
                <option value="Masbate" <?php if(old('province') == "Masbate"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Masbate</option>
                <option value="Misamis Occidental" <?php if(old('province') == "Misamis Occidental"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Misamis Occidental</option>
                <option value="Misamis Oriental" <?php if(old('province') == "Misamis Oriental"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Misamis Oriental</option>
                <option value="Mountain Province" <?php if(old('province') == "Mountain Province"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Mountain Province</option>
                <option value="Negros Occidental" <?php if(old('province') == "Negros Occidental"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Negros Occidental</option>
                <option value="Negros Oriental" <?php if(old('province') == "Negros Oriental"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Negros Oriental</option>
                <option value="Northern Samar" <?php if(old('province') == "Northern Samar"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Northern Samar</option>
                <option value="Nueva Ecija" <?php if(old('province') == "Nueva Ecija"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Nueva Ecija</option>
                <option value="Nueva Vizcaya" <?php if(old('province') == "Nueva Vizcaya"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Nueva Vizcaya</option>
                <option value="Occidental Mindoro" <?php if(old('province') == "Occidental Mindoro"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Occidental Mindoro</option>
                <option value="Oriental Mindoro" <?php if(old('province') == "Oriental Mindoro"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Oriental Mindoro</option>
                <option value="Palawan" <?php if(old('province') == "Palawan"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Palawan</option>
                <option value="Pampanga" <?php if(old('province') == "Pampanga"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Pampanga</option>
                <option value="Pangasinan" <?php if(old('province') == "Pangasinan"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Pangasinan</option>
                <option value="Quezon" <?php if(old('province') == "Quezon"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Quezon</option>
                <option value="Quirino" <?php if(old('province') == "Quirino"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Quirino</option>
                <option value="Rizal" <?php if(old('province') == "Rizal"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Rizal</option>
                <option value="Romblon" <?php if(old('province') == "Romblon"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Romblon</option>
                <option value="Samar" <?php if(old('province') == "Samar"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Samar</option>
                <option value="Sarangani" <?php if(old('province') == "Sarangani"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Sarangani</option>
                <option value="Sorsogon" <?php if(old('province') == "Sorsogon"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Sorsogon</option>
                <option value="South Cotabato" <?php if(old('province') == "South Cotabato"): ?> <?php echo e('selected'); ?> <?php endif; ?>>South Cotabato</option>
                <option value="Southern Leyte" <?php if(old('province') == "Southern Leyte"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Southern Leyte</option>
                <option value="Sultan Kudarat" <?php if(old('province') == "Sultan Kudarat"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Sultan Kudarat</option>
                <option value="Sulu" <?php if(old('province') == "Sulu"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Sulu</option>
                <option value="Surigao del Norte" <?php if(old('province') == "Surigao del Norte"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Surigao del Norte</option>
                <option value="Surigao del Sur" <?php if(old('province') == "Surigao del Sur"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Surigao del Sur</option>
                <option value="Tarlac" <?php if(old('province') == "Tarlac"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Tarlac</option>
                <option value="Tawi-Tawi" <?php if(old('province') == "Tawi-Tawi"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Tawi-Tawi</option>
                <option value="Zambales" <?php if(old('province') == "Zambales"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Zambales</option>
                <option value="Zamboanga del Norte" <?php if(old('province') == "Zamboanga del Norte"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Zamboanga del Norte</option>
                <option value=" Zamboanga del Sur" <?php if(old('province') == "  Zamboanga del Sur"): ?> <?php echo e('selected'); ?> <?php endif; ?>> Zamboanga del Sur</option>
                <option value="Zamboanga Sibugay" <?php if(old('province') == "Zamboanga Sibugay"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Zamboanga Sibugay</option>
                <option value="Metro Manila" <?php if(old('province') == "Metro Manila"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Metro Manila</option>
              </select>
            </div>
            <div class="col-md-4">
              <label><span class="label label-default">Region<span></label>
              <select class="region form-control" name="region">
                <option value="<?php echo e($applicant->region); ?>"><?php echo e($applicant->region); ?></option>
                <option value="NCR" <?php if(old('region') == "NCR"): ?> <?php echo e('selected'); ?> <?php endif; ?>>NCR - National Capital Region</option>
                <option value="CAR" <?php if(old('region') == "CAR"): ?> <?php echo e('selected'); ?> <?php endif; ?>>CAR - Cordillera Administrative Region</option>
                <option value="RI" <?php if(old('region') == "RI"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Region I - Ilocos Region</option>
                <option value="RII" <?php if(old('region') == "RII"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Region II - Cagayan Valley</option>
                <option value="RIII" <?php if(old('region') == "RIII"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Region III - Central Luzon</option>
                <option value="RIV" <?php if(old('region') == "RIV"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Region IV - Calabarzon</option>
                <option value="RV" <?php if(old('region') == "RV"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Region V - Bicol Region</option>
                <option value="RVI" <?php if(old('region') == "RVI"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Region VI - Western Visayas</option>
                <option value="RVII" <?php if(old('region') == "RVII"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Region VII - Central Visayas</option>
                <option value="RVIII" <?php if(old('region') == "RVIII"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Region VIII - Eastern Visayas</option>
                <option value="RIX" <?php if(old('region') == "RIX"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Region IX - Zamboanga Peninsula</option>
                <option value="RX" <?php if(old('region') == "RX"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Region X - Northern Mindanao</option>
                <option value="RXI" <?php if(old('region') == "RXI"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Region XI - Davao Region</option>
                <option value="RXII" <?php if(old('region') == "RXII"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Region XII - Soccsksargen</option>
                <option value="RXIII" <?php if(old('region') == "RXIII"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Region XIII - Caraga</option>
                <option value="BARMM" <?php if(old('region') == "BARMM"): ?> <?php echo e('selected'); ?> <?php endif; ?>>BARMM - Bangsamoro</option>

              </select>
            </div>
            <div class="col-md-4">
              <label><span class="label label-default">Zip Code<span></label>
              <input type="text" style="text-transform: uppercase;"  name="zcode" class="form-control" value="<?php echo e($applicant->zcode); ?>">
            </div>
            <div class="col-md-3">
              <label><span class="label label-default">Last School Attended<span></label>
              <input type="text" style="text-transform: uppercase;" name="lstsch_attended" class="form-control" value="<?php echo e($applicant->lstsch_attended); ?>">
            </div>
            <div class="col-md-3">
              <label><span class="label label-default">Strand<span></label>
              <select class="level form-control" name="strand">
              <option value="<?php echo e($applicant->strand); ?>"><?php echo e($applicant->strand); ?></option>
              <option value="BAM" <?php if(old('strand') == "BAM"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Business, Accountancy, Management (BAM)</option>
              <option value="HESS" <?php if(old('strand') == "HESS"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Humanities, Education, Social Sciences (HESS)</option>
              <option value="STEM" <?php if(old('strand') == "STEM"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Science, Technology, Engineering, Mathematics (STEM)</option>
            </select>
            </div>
            <div class="col-md-2">
              <label><span class="label label-default">School Year</span></label>
              <input type="text" style="text-transform: uppercase;" name="sch_yr" class="form-control" value="<?php echo e($applicant->sch_yr); ?>">
            </div>
            <div class="col-md-2">
            <label><span class="label label-default">Type<span></label>
            <select class="type form-control" name="type">
                <option value="<?php echo e($applicant->type); ?>"><?php echo e($applicant->type); ?></option>
                <option value="Public" <?php if(old('type') == "Public"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Public</option>
                <option value="Private" <?php if(old('type') == "Private"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Private</option>
              </select>
            </div>

            <div class="col-md-2">
            <label><span class="label label-default">Academic Award<span></label>
            <select class="award form-control" name="award">
                <option value="<?php echo e($applicant->award); ?>"><?php echo e($applicant->award); ?></option>
                <option value="Valedictorian" <?php if(old('award') == "Valedictorian"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Valedictorian</option>
                <option value="With Honors" <?php if(old('award') == "With Honors"): ?> <?php echo e('selected'); ?> <?php endif; ?>>With Honors</option>
              </select>
            </div>
          </div>

          <div class="page-header" style="margin-top: 0px;">
              <h2><small>Course Preferences</small></h2>
            </div>

          <div class="row">
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
            <div class="col-md-12">
              <label><span class="label label-default">Course Preference #3<span></label>
              <select class="form-control" name="preference_3">
                <option value="<?php echo e($applicant->preference_3); ?>"><?php echo e($applicant->preference_3); ?></option>
                <option value="BSIT" <?php if(old('preference_3') == "BSIT"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Information Technology</option>
                <option value="BSCrim" <?php if(old('preference_3') == "BSCrim"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science  in Criminology</option>
                <option value="BSHM" <?php if(old('preference_3') == "BSHM"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science  in Hospitality Management</option>
                <option value="BSAGRI-Cs" <?php if(old('preference_3') == "BSAGRI-Cs"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Agriculture major in Crop Science</option>
                <option value="BSAGRI-As" <?php if(old('preference_3') == "BSAGRI-As"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Agriculture major in Animal Science</option>
                <option value="BSF" <?php if(old('preference_3') == "BSF"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Forestry</option>
                <option value="BST" <?php if(old('preference_3') == "BST"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor in Sugar Technology</option>
                <option value="BED - GE" <?php if(old('preference_3') == "BED - GE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Elementary Education major in General Education</option>
                <option value="BSED - English" <?php if(old('preference_3') == "BSED - English"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in English</option>
                <option value="BSED - Filipino" <?php if(old('preference_3') == "BSED - Filipino"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in Filipino</option>
                <option value="BSED - Mathematics" <?php if(old('preference_3') == "BSED - Mathematics"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in Mathematics</option>
                <option value="BSED - Science" <?php if(old('preference_3') == "BSED - Science"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Secondary Education major in Science</option>
                <option value="BASS" <?php if(old('preference_3') == "BASS"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Arts major in Social Science</option>
                <option value="BSABE" <?php if(old('preference_3') == "BSABE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Agricultural and Biosystems Engineering</option>
                <option value="BSEE" <?php if(old('preference_3') == "BSEE"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Electrical Engineering</option>
                <option value="BSME" <?php if(old('preference_3') == "BSME"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Mechanical Engineering</option>
                <option value="BSME" <?php if(old('preference_3') == "BSME"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bachelor of Science in Mechanical Engineering</option>
              </select>
            </div>
      </div>

      <div class="container-fluid">
          <div class="page-header" style="margin-top: 0px;">
              <h2><small>Available Documents</small></h2>
          </div>

          <div class="row">
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
<?php echo $__env->make('layouts.master_admission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/admission/applicant_edit.blade.php ENDPATH**/ ?>