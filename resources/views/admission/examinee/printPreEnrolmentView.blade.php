@extends('layouts.master_admission')

@section('title')
COAS - V1.0 || Pre-Enrolment Form
@endsection

@section('sideheader')
<h4>Admission</h4>
@endsection

@yield('sidemenu')

@section('workspace')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Admission</li>
        <li>{{ $examinee->admission_id }}</li>
        <li>{{ ucwords(strtolower($examinee->fname)) }} {{ ucwords($examinee->mname[0]) }}. {{ ucwords(strtolower($examinee->lname)) }}</li>
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
        <iframe src="{{ route('genPreEnrolment', $examinee->id) }}" width="100%" height="800"></iframe>
    </div>
  </div>
</div>
@endsection

