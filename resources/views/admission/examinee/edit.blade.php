@extends('layouts.master_admission')

@section('title')
COAS - V1.0 || Edit Data
@endsection

@section('sideheader')
<h4>Admission</h4>
@endsection

@yield('sidemenu')


@section('workspace')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Admission</li>
        <li>{{ $applicant->admission_id }}</li>
        <li>{{ ucwords(strtolower($applicant->fname)) }} {{ ucwords($applicant->mname[0]) }}. {{ ucwords(strtolower($applicant->lname)) }}</li>
        <li class="active">Edit Data</li>
    </ol>

  <div class="container-fluid">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#appinfo" style="color:#008000;">Examinee Information</a></li>
    <li><a data-toggle="tab" href="#testresult" style="color:#008000;">Assign Test Result</a></li>
    <li><a data-toggle="tab" href="#printAppForm" style="color:#008000;">View/Print Examinee Data</a></li>
    <li><a data-toggle="tab" href="#appImage" style="color:#008000;">Capture Examinee Image</a></li>
  </ul>

  <div class="tab-content">
    <div id="appinfo" class="tab-pane fade in active">
         <div class="container-fluid">
    <div class="row">
    <p>@if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success')}}</div>
      @elseif (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>  
    @endif</p>

    <form method="POST" action="{{ route('applicant_update', $applicant->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

      <div class="page-header" style="margin-top: 0px;">
        <h4>Applicant Information</h4>
      </div>
      <div class="col-md-2">
        <label><span class="label label-default">Admission No.</span></label>
        <input type="text" class="form-control" name="admissionid" value="{{$applicant->admission_id}}" disabled>
      </div>
       <div class="col-md-2" {{ ($errors->has('type')) ? 'has-error' : ''}}>
        <label><span class="label label-default">Admission Type</span></label>
        <select class="form-control" name="type">
          <option value="{{$applicant->type}}">@if ($applicant->type == 1) New @elseif($applicant->type == 2) Returnee @elseif($applicant->type == 3) Transferee @endif</option>
          <option value="1" @if (old('type') == 1) {{ 'selected' }} @endif>New</option>
          <option value="2" @if (old('type') == 2) {{ 'selected' }} @endif>Returnee</option>
          <option value="3" @if (old('type') == 3) {{ 'selected' }} @endif>Transferee</option>
        </select>
        @if ($errors->has('type'))
        <span class="label label-danger">{{ $errors->first('type') }}</span>
        @endif
      </div>
      <div class="col-md-3" {{ ($errors->has('lname')) ? 'has-error' : ''}}>
          <label><span class="label label-default">Lastname</span></label>
          <input type="text" style="text-transform: uppercase;"  name="lname" class="form-control" value="{{$applicant->lname}}">
      </div>
      <div class="col-md-3">
            <label><span class="label label-default">Firstname<span></label>
            <input type="text" style="text-transform: uppercase;"  name="fname" class="form-control" value="{{$applicant->fname}}">
      </div>
      <div class="col-md-2">
        <label><span class="label label-default">Middlename<span></label>
        <input type="text" style="text-transform: uppercase;"  name="mname" class="form-control" value="{{$applicant->mname}}">
      </div>
      <div class="col-md-2">
      <label><span class="label label-default">Ext.<span></label>
      <select class="form-control" name="ext">
          <option value="{{$applicant->ext}}">{{$applicant->ext}}</option>
          <option value=" " @if (old('ext') == " ") {{ 'selected' }} @endif>N/A</option>
          <option value="Jr." @if (old('ext') == "Jr.") {{ 'selected' }} @endif>Jr.</option>
          <option value="Sr." @if (old('ext') == "Sr.") {{ 'selected' }} @endif>Sr.</option> 
        </select>
      </div>
      <div class="col-md-2" {{ ($errors->has('gender')) ? 'has-error' : ''}}>
      <label><span class="label label-default">Gender<span></label>
        <select class="form-control" name="gender">
          <option value="{{$applicant->gender}}">{{$applicant->gender}}</option>
          <option value="Male" @if (old('gender') == "Male") {{ 'selected' }} @endif>Male</option>
          <option value="Female" @if (old('gender') == "Female") {{ 'selected' }} @endif>Female</option>
        </select>
        @if ($errors->has('gender'))
        <span class="label label-danger">{{ $errors->first('gender') }}</span>
        @endif
      </div>
      <div class="col-md-2">
        <label><span class="label label-default">Date of Birth <span>(d/m/y)</span></label>
        <input type="date" class="form-control" name="bday" value="{{$applicant->bday}}">
      </div>
      <div class="col-md-2" {{ ($errors->has('age')) ? 'has-error' : ''}}>
      <label><span class="label label-default">Age</span></label>
      <select class="form-control" name="age">
          <option value="{{$applicant->age}}">{{$applicant->age}}</option>
          <option value="16" @if (old('age') == "16") {{ 'selected' }} @endif>16</option>
          <option value="17" @if (old('age') == "17") {{ 'selected' }} @endif>17</option>
          <option value="18" @if (old('age') == "18") {{ 'selected' }} @endif>18</option>
          <option value="19" @if (old('age') == "19") {{ 'selected' }} @endif>19</option>
          <option value="20" @if (old('age') == "20") {{ 'selected' }} @endif>20</option>
          <option value="21" @if (old('age') == "21") {{ 'selected' }} @endif>21</option>
          <option value="22" @if (old('age') == "22") {{ 'selected' }} @endif>22</option>
          <option value="23" @if (old('age') == "23") {{ 'selected' }} @endif>23</option>
          <option value="24" @if (old('age') == "24") {{ 'selected' }} @endif>24</option>
          <option value="25" @if (old('age') == "25") {{ 'selected' }} @endif>25</option>
          <option value="26" @if (old('age') == "26") {{ 'selected' }} @endif>26</option>
          <option value="27" @if (old('age') == "27") {{ 'selected' }} @endif>27</option>
          <option value="28" @if (old('age') == "28") {{ 'selected' }} @endif>28</option>
          <option value="29" @if (old('age') == "29") {{ 'selected' }} @endif>29</option>
          <option value="30" @if (old('age') == "30") {{ 'selected' }} @endif>30</option>
          <option value="31" @if (old('age') == "31") {{ 'selected' }} @endif>31</option>
          <option value="32" @if (old('age') == "32") {{ 'selected' }} @endif>32</option>
          <option value="33" @if (old('age') == "33") {{ 'selected' }} @endif>33</option>
          <option value="34" @if (old('age') == "34") {{ 'selected' }} @endif>34</option>
          <option value="35" @if (old('age') == "35") {{ 'selected' }} @endif>35</option>
          <option value="36" @if (old('age') == "36") {{ 'selected' }} @endif>36</option>
          <option value="37" @if (old('age') == "37") {{ 'selected' }} @endif>37</option>
          <option value="38" @if (old('age') == "38") {{ 'selected' }} @endif>38</option>
          <option value="39" @if (old('age') == "39") {{ 'selected' }} @endif>39</option>
          <option value="40" @if (old('age') == "40") {{ 'selected' }} @endif>40</option>
          <option value="41" @if (old('age') == "41") {{ 'selected' }} @endif>41</option>
          <option value="42" @if (old('age') == "42") {{ 'selected' }} @endif>42</option>
          <option value="43" @if (old('age') == "43") {{ 'selected' }} @endif>43</option>
          <option value="44" @if (old('age') == "44") {{ 'selected' }} @endif>44</option>
          <option value="45" @if (old('age') == "45") {{ 'selected' }} @endif>45</option>
          <option value="46" @if (old('age') == "46") {{ 'selected' }} @endif>46</option>
          <option value="47" @if (old('age') == "47") {{ 'selected' }} @endif>47</option>
          <option value="48" @if (old('age') == "48") {{ 'selected' }} @endif>48</option>
          <option value="49" @if (old('age') == "49") {{ 'selected' }} @endif>49</option>
          <option value="50" @if (old('age') == "46") {{ 'selected' }} @endif>50</option>
          <option value="51" @if (old('age') == "51") {{ 'selected' }} @endif>51</option>
          <option value="52" @if (old('age') == "52") {{ 'selected' }} @endif>52</option>
          <option value="53" @if (old('age') == "53") {{ 'selected' }} @endif>53</option>
          <option value="54" @if (old('age') == "54") {{ 'selected' }} @endif>54</option>
          <option value="55" @if (old('age') == "55") {{ 'selected' }} @endif>55</option>
          <option value="56" @if (old('age') == "56") {{ 'selected' }} @endif>56</option>
          <option value="57" @if (old('age') == "57") {{ 'selected' }} @endif>57</option>
          <option value="58" @if (old('age') == "58") {{ 'selected' }} @endif>58</option>
          <option value="59" @if (old('age') == "59") {{ 'selected' }} @endif>59</option>
          <option value="60" @if (old('age') == "46") {{ 'selected' }} @endif>60</option>
        </select>
        @if ($errors->has('age'))
        <span class="label label-danger">{{ $errors->first('age') }}</span>
        @endif
      </div>
      <div class="col-md-2">
        <label><span class="label label-default">Contact #<span></label>
        <input type="tel" class="form-control" name="contact" value="{{$applicant->contact}}">
      </div>
      <div class="col-md-2">
        <label><span class="label label-default">Email Address<span></label>
        <input type="email" class="form-control" name="email" value="{{$applicant->email}}"/>
      </div>
      <div class="col-md-12" {{ ($errors->has('address')) ? 'has-error' : ''}}>
        <label><span class="label label-default">Address</span></label>
        <input type="text" name="address" class="form-control" value="{{$applicant->address}}">
        @if ($errors->has('address'))
        <span class="label label-danger">{{ $errors->first('address') }}</span>
        @endif
      </div>

      <div class="container-fluid">
      </div>

      <div class="page-header" style="margin-top: 0px;">
        <h4>For New Student</h4>
      </div>

      <div class="col-md-6">
        <label><span class="label label-default">Last School Attended<span></label>
        <input type="text" style="text-transform: uppercase;" name="lstsch_attended" class="form-control" value="{{$applicant->lstsch_attended}}">
      </div>

      <div class="col-md-6">
        <label><span class="label label-default">Strand<span></label>
        <select class="level form-control" name="strand">
        <option value="{{$applicant->strand}}">{{$applicant->strand}}</option>
        <option value="BAM" @if (old('strand') == "BAM") {{ 'selected' }} @endif>Business, Accountancy, Management (BAM)</option>
        <option value="HESS" @if (old('strand') == "HESS") {{ 'selected' }} @endif>Humanities, Education, Social Sciences (HESS)</option>
        <option value="STEM" @if (old('strand') == "STEM") {{ 'selected' }} @endif>Science, Technology, Engineering, Mathematics (STEM)</option>
      </select>
      </div>

      <div class="container-fluid">
      </div>
      <div class="page-header" style="margin-top: 0px;">
          <h4>For Transferee</h4>
      </div>

      <div class="col-md-6">
        <label><span class="label label-default">College/University last attended<span></label>
        <input type="text" style="text-transform: uppercase;" name="suc_lst_attended" class="form-control" value="{{$applicant->suc_lst_attended}}">
      </div>

      <div class="col-md-6" {{ ($errors->has('course')) ? 'has-error' : ''}}>
        <label><span class="label label-default">Course</span></label>
        <select class="form-control" name="course">
          <option value="{{$applicant->course}}">{{$applicant->course}}</option>
          <option value="BSIT" @if (old('course') == "BSIT") {{ 'selected' }} @endif>Bachelor of Science in Information Technology</option>
          <option value="BSCrim" @if (old('course') == "BSCrim") {{ 'selected' }} @endif>Bachelor of Science  in Criminology</option>
          <option value="BSHM" @if (old('course') == "BSHM") {{ 'selected' }} @endif>Bachelor of Science  in Hospitality Management</option>
          <option value="BSAGRI-Cs" @if (old('course') == "BSAGRI-Cs") {{ 'selected' }} @endif>Bachelor of Science in Agriculture major in Crop Science</option>
          <option value="BSAGRI-As" @if (old('course') == "BSAGRI-As") {{ 'selected' }} @endif>Bachelor of Science in Agriculture major in Animal Science</option>
          <option value="BSF" @if (old('course') == "BSF") {{ 'selected' }} @endif>Bachelor of Science in Forestry</option>
          <option value="BST" @if (old('course') == "BST") {{ 'selected' }} @endif>Bachelor in Sugar Technology</option>
          <option value="BED - GE" @if (old('course') == "BED - GE") {{ 'selected' }} @endif>Bachelor of Elementary Education major in General Education</option>
          <option value="BSED - English" @if (old('course') == "BSED - English") {{ 'selected' }} @endif>Bachelor of Secondary Education major in English</option>
          <option value="BSED - Filipino" @if (old('course') == "BSED - Filipino") {{ 'selected' }} @endif>Bachelor of Secondary Education major in Filipino</option>
          <option value="BSED - Mathematics" @if (old('course') == "BSED - Mathematics") {{ 'selected' }} @endif>Bachelor of Secondary Education major in Mathematics</option>
          <option value="BSED - Science" @if (old('course') == "BSED - Science") {{ 'selected' }} @endif>Bachelor of Secondary Education major in Science</option>
          <option value="BASS" @if (old('course') == "BASS") {{ 'selected' }} @endif>Bachelor of Arts major in Social Science</option>
          <option value="BSABE" @if (old('course') == "BSABE") {{ 'selected' }} @endif>Bachelor of Science in Agricultural and Biosystems Engineering</option>
          <option value="BSEE" @if (old('course') == "BSEE") {{ 'selected' }} @endif>Bachelor of Science in Electrical Engineering</option>
          <option value="BSME" @if (old('course') == "BSME") {{ 'selected' }} @endif>Bachelor of Science in Mechanical Engineering</option>
        </select>
        @if ($errors->has('course'))
        <span class="label label-danger">{{ $errors->first('course') }}</span>
        @endif
      </div>

      <div class="container-fluid">
      </div>
      <div class="page-header" style="margin-top: 0px;">
        <h4>Course Preferences</h4>
      </div>

      <div class="col-md-12">
        <label><span class="label label-default">Course Preference #1<span></label>
        <select class="form-control" name="preference_1">
          <option value="{{$applicant->preference_1}}">{{$applicant->preference_1}}</option>
          <option value="BSIT" @if (old('preference_1') == "BSIT") {{ 'selected' }} @endif>Bachelor of Science in Information Technology</option>
          <option value="BSCrim" @if (old('preference_1') == "BSCrim") {{ 'selected' }} @endif>Bachelor of Science  in Criminology</option>
          <option value="BSHM" @if (old('preference_1') == "BSHM") {{ 'selected' }} @endif>Bachelor of Science  in Hospitality Management</option>
          <option value="BSAGRI-Cs" @if (old('preference_1') == "BSAGRI-Cs") {{ 'selected' }} @endif>Bachelor of Science in Agriculture major in Crop Science</option>
          <option value="BSAGRI-As" @if (old('preference_1') == "BSAGRI-As") {{ 'selected' }} @endif>Bachelor of Science in Agriculture major in Animal Science</option>
          <option value="BSF" @if (old('preference_1') == "BSF") {{ 'selected' }} @endif>Bachelor of Science in Forestry</option>
          <option value="BST" @if (old('preference_1') == "BST") {{ 'selected' }} @endif>Bachelor in Sugar Technology</option>
          <option value="BED - GE" @if (old('preference_1') == "BED - GE") {{ 'selected' }} @endif>Bachelor of Elementary Education major in General Education</option>
          <option value="BSED - English" @if (old('preference_1') == "BSED - English") {{ 'selected' }} @endif>Bachelor of Secondary Education major in English</option>
          <option value="BSED - Filipino" @if (old('preference_1') == "BSED - Filipino") {{ 'selected' }} @endif>Bachelor of Secondary Education major in Filipino</option>
          <option value="BSED - Mathematics" @if (old('preference_1') == "BSED - Mathematics") {{ 'selected' }} @endif>Bachelor of Secondary Education major in Mathematics</option>
          <option value="BSED - Science" @if (old('preference_1') == "BSED - Science") {{ 'selected' }} @endif>Bachelor of Secondary Education major in Science</option>
          <option value="BASS" @if (old('preference_1') == "BASS") {{ 'selected' }} @endif>Bachelor of Arts major in Social Science</option>
          <option value="BSABE" @if (old('preference_1') == "BSABE") {{ 'selected' }} @endif>Bachelor of Science in Agricultural and Biosystems Engineering</option>
          <option value="BSEE" @if (old('preference_1') == "BSEE") {{ 'selected' }} @endif>Bachelor of Science in Electrical Engineering</option>
          <option value="BSME" @if (old('preference_1') == "BSME") {{ 'selected' }} @endif>Bachelor of Science in Mechanical Engineering</option>
          <option value="BSME" @if (old('preference_1') == "BSME") {{ 'selected' }} @endif>Bachelor of Science in Mechanical Engineering</option>
        </select>
      </div>

      <div class="col-md-12">
        <label><span class="label label-default">Course Preference #2<span></label>
        <select class="form-control" name="preference_2">
          <option value="{{$applicant->preference_2}}">{{$applicant->preference_2}}</option>
          <option value="BSIT" @if (old('preference_2') == "BSIT") {{ 'selected' }} @endif>Bachelor of Science in Information Technology</option>
          <option value="BSCrim" @if (old('preference_2') == "BSCrim") {{ 'selected' }} @endif>Bachelor of Science  in Criminology</option>
          <option value="BSHM" @if (old('preference_2') == "BSHM") {{ 'selected' }} @endif>Bachelor of Science  in Hospitality Management</option>
          <option value="BSAGRI-Cs" @if (old('preference_2') == "BSAGRI-Cs") {{ 'selected' }} @endif>Bachelor of Science in Agriculture major in Crop Science</option>
          <option value="BSAGRI-As" @if (old('preference_2') == "BSAGRI-As") {{ 'selected' }} @endif>Bachelor of Science in Agriculture major in Animal Science</option>
          <option value="BSF" @if (old('preference_2') == "BSF") {{ 'selected' }} @endif>Bachelor of Science in Forestry</option>
          <option value="BST" @if (old('preference_2') == "BST") {{ 'selected' }} @endif>Bachelor in Sugar Technology</option>
          <option value="BED - GE" @if (old('preference_2') == "BED - GE") {{ 'selected' }} @endif>Bachelor of Elementary Education major in General Education</option>
          <option value="BSED - English" @if (old('preference_2') == "BSED - English") {{ 'selected' }} @endif>Bachelor of Secondary Education major in English</option>
          <option value="BSED - Filipino" @if (old('preference_2') == "BSED - Filipino") {{ 'selected' }} @endif>Bachelor of Secondary Education major in Filipino</option>
          <option value="BSED - Mathematics" @if (old('preference_2') == "BSED - Mathematics") {{ 'selected' }} @endif>Bachelor of Secondary Education major in Mathematics</option>
          <option value="BSED - Science" @if (old('preference_2') == "BSED - Science") {{ 'selected' }} @endif>Bachelor of Secondary Education major in Science</option>
          <option value="BASS" @if (old('preference_2') == "BASS") {{ 'selected' }} @endif>Bachelor of Arts major in Social Science</option>
          <option value="BSABE" @if (old('preference_2') == "BSABE") {{ 'selected' }} @endif>Bachelor of Science in Agricultural and Biosystems Engineering</option>
          <option value="BSEE" @if (old('preference_2') == "BSEE") {{ 'selected' }} @endif>Bachelor of Science in Electrical Engineering</option>
          <option value="BSME" @if (old('preference_2') == "BSME") {{ 'selected' }} @endif>Bachelor of Science in Mechanical Engineering</option>
          <option value="BSME" @if (old('preference_2') == "BSME") {{ 'selected' }} @endif>Bachelor of Science in Mechanical Engineering</option>
        </select>
      </div>
      <div class="container-fluid">
      </div>
      <div class="page-header" style="margin-top: 0px;">
          <h4>Schedule of Examination</h4>
      </div>
       <div class="col-md-4">
        <label><span class="label label-default">Date of Admission Test</span></label>
        <input type="date" class="form-control" name="d_admission" value="{{$applicant->d_admission}}">
      </div>
      <div class="col-md-4">
        <label><span class="label label-default">Time</span></label>
        <input type="time" class="form-control" name="time" value="{{$applicant->time}}">
      </div>
      <div class="col-md-4">
        <label><span class="label label-default">Venue</span></label>
        <input type="text" class="form-control" name="venue" value="{{$applicant->venue}}">
      </div>

      <div class="container-fluid">
      </div>
      <div class="page-header" style="margin-top: 0px;">
          <h4>Available Documents</h4>
      </div>

      <div class="row">
        <div class="container-fluid">
            <div class="col-md-12">
                <input type="radio" name="r_card" value="Yes" @foreach($docs as $doc) {{ old('r_card', $doc->r_card) === 'Yes' ? 'checked' : '' }} @endforeach> Yes
                <input type="radio" name="r_card" value="No" @foreach($docs as $doc) {{ old('r_card', $doc->r_card) === 'No' ? 'checked' : '' }} @endforeach> No
              <label>| Report Card</label>
            </div>
            <div class="col-md-12">
                <input type="radio" name="g_moral" value="Yes" @foreach($docs as $doc) {{ old('g_moral', $doc->g_moral) === 'Yes' ? 'checked' : '' }} @endforeach> Yes
                <input type="radio" name="g_moral" value="No" @foreach($docs as $doc) {{ old('g_moral', $doc->g_moral) === 'No' ? 'checked' : '' }} @endforeach> No
              <label>| Certificate of Good Moral</label>
            </div>
            <div class="col-md-12">
                <input type="radio" name="b_cert" value="Yes" @foreach($docs as $doc) {{ old('b_cert', $doc->b_cert) === 'Yes' ? 'checked' : '' }} @endforeach> Yes
                <input type="radio" name="b_cert" value="No" @foreach($docs as $doc) {{ old('b_cert', $doc->b_cert) === 'No' ? 'checked' : '' }} @endforeach> No
              <label>| Birth Certificate</label>
            </div>
            <div class="col-md-12">
                <input type="radio" name="m_cert" value="Yes" @foreach($docs as $doc) {{ old('m_cert', $doc->m_cert) === 'Yes' ? 'checked' : '' }} @endforeach> Yes
                <input type="radio" name="m_cert" value="No" @foreach($docs as $doc) {{ old('m_cert', $doc->m_cert) === 'No' ? 'checked' : '' }} @endforeach> No
              <label>| Medical Certificate</label>
            </div>
            <div class="col-md-12">
                <input type="radio" name="t_record" value="Yes" @foreach($docs as $doc) {{ old('t_record', $doc->t_record) === 'Yes' ? 'checked' : '' }} @endforeach> Yes
                <input type="radio" name="t_record" value="No" @foreach($docs as $doc) {{ old('t_record', $doc->t_record) === 'No' ? 'checked' : '' }} @endforeach> No
              <label>| Transcript of Record (For transferees)</label>
            </div>
            <div class="col-md-12">
                <input type="radio" name="h_dismissal" value="Yes" @foreach($docs as $doc) {{ old('h_dismissal', $doc->h_dismissal) === 'Yes' ? 'checked' : '' }} @endforeach> Yes
                <input type="radio" name="h_dismissal" value="No" @foreach($docs as $doc) {{ old('h_dismissal', $doc->h_dismissal) === 'No' ? 'checked' : '' }} @endforeach> No
              <label>| Honorable Dismissal (For transferees)</label>
            </div>
          </div>
        </div>

        <div class="modal-footer text-center">
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-warning">Update Record</button>
            </div>
        </div>
    </form>
    </div>
    </div>
  </div>


    <div id="testresult" class="tab-pane fade">
        <div class="container-fluid">
          <div class="row">
          <p>@if(Session::has('success'))
              <div class="alert alert-success">{{ Session::get('success')}}</div>
            @elseif (Session::has('fail'))
              <div class="alert alert-danger">{{Session::get('fail')}}</div>  
          @endif</p>

          <form method="POST" action="{{ route('examinee_result_save', $applicant->id) }}">
              @csrf
              @method('PUT')
            
            <div class="container-fluid">
            </div>

            <div class="page-header" style="margin-top: 0px;">
              <h4>Assign Result</h4>
            </div>
             <div class="col-md-offset-2 col-md-4">
              <label><span class="label label-default">Raw Score</span></label>
              <input type="text" class="form-control" name="raw_score" value="{{$applicant->result->raw_score}}">
            </div>
            <div class="col-md-4">
              <label><span class="label label-default">Precentile</span></label>
              <input type="text" class="form-control" name="percentile" value="{{$applicant->result->percentile}}">
            </div>
            <div class="container-fluid">
            </div>
            <div class="modal-footer text-center">
          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-warning">Save</button>
            <a data-toggle="tooltip" data-placement="bottom" title="Process Applicant"><i id="{{ $applicant->id }}" data-toggle="modal" data-target="#tab_info_examinee" class="btn btn-warning info_applicant">Push Examinee</i></a>
          </div>
      </div>
          </form>
          </div>
          </div>
    </div>


    <div id="printAppForm" class="tab-pane fade">
      <div class="container-fluid">
          <div class="row">
          <p>@if(Session::has('success'))
              <div class="alert alert-success">{{ Session::get('success')}}</div>
            @elseif (Session::has('fail'))
              <div class="alert alert-danger">{{Session::get('fail')}}</div>  
          @endif</p>

          <div class="container-fluid">
              <iframe src="{{ route('applicant_genPDF', $applicant->id) }}" width="100%" height="800"></iframe>
          </div>
        </div>
      </div>
    </div>


    <div id="appImage" class="tab-pane fade">
      <div class="container-fluid">
        <div class="row">
        <p>@if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success')}}</div>
          @elseif (Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>  
        @endif</p>

        <form method="POST" action="{{ route('applicant_save_image', $applicant->id) }}">
        @csrf
        <div class="row col-md-6">
          <label>Camera</label>
          <div id="coas_camera" class="coas_camera"></div>
          <input type=button class="capture_snapshot btn btn-warning" value="Capture Snapshot" onClick="capture_snapshot()">
            <input type="hidden" name="image" class="image-tag">
      </div>
      
      <div class="row col-md-6">
        <label>Result</label>
        <div id="results" class="coas_camera_result"></div>
        {{ csrf_field() }}
            <button class="capture_snapshot btn btn-warning">Submit</button>
      </div>
      </form>
      </div>
</div>
    </div>
  </div>
  </div>
@endsection

@section('script')
<script src="{{asset('bootstrap/js/webcam.min.js')}}"></script>   
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
@endsection