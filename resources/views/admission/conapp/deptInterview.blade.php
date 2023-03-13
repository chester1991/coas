@extends('layouts.master_admission')

@section('title')
COAS - V1.0 || Pre-Enrolment
@endsection

@section('sideheader')
<h4>Admission</h4>
@endsection

@yield('sidemenu')


@section('workspace')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Examinee Result</li>
        <li>{{ $applicant->admission_id }}</li>
        <li>{{ ucwords(strtolower($applicant->fname)) }} {{ ucwords($applicant->mname[0]) }}. {{ ucwords(strtolower($applicant->lname)) }}</li>
        <li class="active">Pre-Enrolment</li>
    </ol>
    <div class="container-fluid">
    <div class="row">
    <p>@if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success')}}</div>
      @elseif (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>  
    @endif</p>

    <form method="POST" action="{{ route('save_applicant_rating', $applicant->id) }}">
        @csrf
        @method('PUT')
      
      <div class="container-fluid">
      </div>

      <div class="page-header" style="margin-top: 0px;">
        <h4>Assign Result</h4>
      </div>
       <div class="col-md-3" {{ ($errors->has('rating')) ? 'has-error' : ''}}>
        <label><span class="label label-default">Rating</span></label>
        <input type="number" class="form-control" name="rating" value="{{ $applicant->interview->rating }}">
        @if ($errors->has('rating'))
      <span class="label label-danger">{{ $errors->first('rating') }}</span>
      @endif
      </div>
      <div class="col-md-4" {{ ($errors->has('remarks')) ? 'has-error' : ''}}>
        <label><span class="label label-default">Remarks</span></label>
        <select class="level form-control" name="remarks">
        <option value="{{ $applicant->interview->remarks }}">@if ($applicant->interview->remarks == 1) Accepted for Enrolment @else Not Accepted for Enrolment @endif</option>
        <option value="1">Accepted for Enrolment</option>
        <option value="2">Not Accepted for Enrolment</option>
      </select>
      @if ($errors->has('remarks'))
      <span class="label label-danger">{{ $errors->first('remarks') }}</span>
      @endif
      </div>
      <div class="col-md-5" {{ ($errors->has('course')) ? 'has-error' : ''}}>
        <label><span class="label label-default">Course</span></label>
        <select class="form-control" name="course">
          <option value="{{ $applicant->interview->course }}">{{ $applicant->interview->course }}</option>
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
      <div class="col-md-12" {{ ($errors->has('reason')) ? 'has-error' : ''}}>
        <label><span class="label label-default">Reason</span></label>
        <textarea class="form-control" name="reason" rows="4" cols="50" value="">{{ $applicant->interview->reason }}</textarea>
      @if ($errors->has('reason'))
      <span class="label label-danger">{{ $errors->first('reason') }}</span>
      @endif
      </div>
      <div class="container-fluid">
      </div>
      <div class="modal-footer text-center" style="border:0px">
          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-warning">Save Rating</button>
          </div>
      </div>
    </form>
    </div>
    </div>
@endsection