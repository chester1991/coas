@extends('layouts.master_admission')

@section('title')
COAS - V1.0 || Schedule Examination
@endsection

@section('sideheader')
<h4>Admission</h4>
@endsection

@yield('sidemenu')

@section('workspace')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Schedule Examination</li>
        <li>{{ $applicant->admission_id }}</li>
        <li>{{ ucwords(strtolower($applicant->fname)) }} {{ ucwords($applicant->mname[0]) }}. {{ ucwords(strtolower($applicant->lname)) }}</li>
        <li class="active">Schedule</li>
    </ol>
    <div class="container-fluid">
    <div class="row">
    <p>@if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success')}}</div>
      @elseif (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>  
    @endif</p>

    <form method="POST" action="{{ route('applicant_schedule_save', $applicant->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      
      <div class="container-fluid">
      </div>

      <div class="page-header" style="margin-top: 0px;">
        <h4>Schedule Examination</h4>
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
       <div class="modal-footer text-center">
          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-warning">Schedule</button>
            <a data-toggle="tooltip" data-placement="bottom" title="Process Applicant"><i id="{{ $applicant->id }}" data-toggle="modal" data-target="#tab_info_app" class="btn btn-warning info_applicant">Push Applicant</i></a>
          </div>
      </div>
    </form>
    </div>
    </div>
@endsection