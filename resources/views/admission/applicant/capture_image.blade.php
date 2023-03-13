@extends('layouts.master_admission')

@section('title')
COAS - V1.0 || Applicant Image
@endsection

@section('sideheader')
<h4>Admission</h4>
@endsection

@yield('sidemenu')


@section('workspace')
<ol class="breadcrumb">
        <li>Admission</li>
        <li>{{ $applicant->admission_id }}</li>
        <li>{{ ucwords(strtolower($applicant->fname)) }} {{ ucwords($applicant->mname[0]) }}. {{ ucwords(strtolower($applicant->lname)) }}</li>
        <li class="active">Capture Image</li>
    </ol>
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