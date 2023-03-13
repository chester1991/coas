@extends('layouts.master_admission')

@section('title')
COAS - V1.0 || Applicant List
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
        <li class="active">Print | Download</li>
    </ol>
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
@endsection

