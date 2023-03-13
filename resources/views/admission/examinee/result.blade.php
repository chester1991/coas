@extends('layouts.master_admission')

@section('title')
COAS - V1.0 || Examinee Result
@endsection

@section('sideheader')
<h4>Admission</h4>
@endsection

@yield('sidemenu')


@section('workspace')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Examinee Result</li>
        <li>{{ $assignresult->admission_id }}</li>
        <li>{{ ucwords(strtolower($assignresult->fname)) }} {{ ucwords($assignresult->mname[0]) }}. {{ ucwords(strtolower($assignresult->lname)) }}</li>
        <li class="active">Assign</li>
    </ol>
    <div class="container-fluid">
    <div class="row">
    <p>@if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success')}}</div>
      @elseif (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>  
    @endif</p>

    <form method="POST" action="{{ route('examinee_result_save', $assignresult->id) }}">
        @csrf
        @method('PUT')
      
      <div class="container-fluid">
      </div>

      <div class="page-header" style="margin-top: 0px;">
        <h4>Assign Result</h4>
      </div>
       <div class="col-md-offset-2 col-md-4">
        <label><span class="label label-default">Raw Score</span></label>
        <input type="text" class="form-control" name="raw_score" value="@foreach($assign as $assign){{$assign->raw_score}}@endforeach">
      </div>
      <div class="col-md-4">
        <label><span class="label label-default">Precentile</span></label>
        <input type="text" class="form-control" name="percentile" value="@foreach($per as $per){{$per->percentile}}@endforeach">
      </div>
      <div class="container-fluid">
      </div>
      <div class="modal-footer text-center" style="border:0px">
          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-warning">Save</button>
          </div>
      </div>
    </form>
    </div>
    </div>
@endsection