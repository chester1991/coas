@extends('layouts.master_admission')

@section('title')
COAS - V1.0 || Applicant List
@endsection

@yeild('style')

@section('sideheader')
<h4>Admission</h4>
@endsection

@yield('sidemenu')

@section('workspace')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Admission</li>
        <li class="active">Applicant List</li>
    </ol>
    <div class="row">
    
    <div class="container-fluid"><p>@if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success')}}</div>
      @elseif (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>  
    @endif</p></div>
    
    <form method="GET" action="{{ route('srchappList') }}">
       {{ csrf_field() }}
            <div class="container-fluid">
            <div class="searchclub jumbotron">
            <div class="col-md-2">
              <select class="form-control" id="year" name="year">
              </select>
            </div>
            <div class="col-md-3">
                <select class="form-control" name="campus">
                 <option value="{{Auth::user()->campus}}">@if (Auth::user()->campus == 'MC') Main @elseif(Auth::user()->campus == 'SCC') San Carlos @elseif(Auth::user()->campus == 'VC') Victorias @elseif(Auth::user()->campus == 'HC') Hinigaran @elseif(Auth::user()->campus == 'MP') Moises Padilla @elseif(Auth::user()->campus == 'HinC') Hinobaan @elseif(Auth::user()->campus == 'SC') Sipalay @elseif(Auth::user()->campus == 'IC') Ilog @elseif(Auth::user()->campus == 'CC') Cauayan @endif</option>
                @if (Auth::user()->isAdmin == 0)
                <option value="MC">Main</option>
                <option value="SCC">San Carlos</option>
                <option value="VC">Victorias</option>
                <option value="HC">Hinigaran</option>
                <option value="MP">Moises Padilla</option>
                <option value="HinC">Hinobaan</option>
                <option value="SC">Sipalay</option>
                <option value="IC">Ilog</option>
                <option value="CC">Cauayan</option>
                @else
                @endif
              </select>
            </div>
            <div class="col-md-2">
              <input type="text" class="form-control" name="admission_id" placeholder="Applicant ID">
            </div>
            <div class="col-md-3">
              <select class="form-control" name="strand">
                <option value="">Strand</option>
                <option value="BAM">BAM</option>
                <option value="HESS">HESS</option>
                <option value="STEM">STEM</option>
              </select>
            </div>
            <div class="col-md-2">
              <button type="submit" class="form-control btn btn-danger">Seach</button>
            </div>
          </div>
          <h4>Search Results: {{ $totalSearchResults }} <small><i>Year-<b>{{ request('year') }}</b>, Campus-<b>{{ request('campus') }}</b>, ID-<b>{{ request('admission_id') }}</b>,  Strand-<b>{{ request('strand') }}</b>,</i></small></h4>
        </div>
    </form>

    <div class="container-fluid">
    <table id="applicant-list" class="display nowrap" style="width:100%">
       <thead>
              <tr>
                    <th>App ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Email</th>
                    <th>Contact #</th>
                    <th>Date Applied</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $applicant)
                @if ($applicant->p_status == 1) 
                <tr>
                  <td>{{ $applicant->admission_id }}</td>
                  <td style="text-transform: uppercase;"><b>{{ $applicant->fname }} {{ substr($applicant->mname,0,1) }}. {{ $applicant->lname }}</b></td>
                  <td>@if ($applicant->type == 1) New @elseif($applicant->type == 2) Returnee @elseif($applicant->type == 3) Transferee @endif</td>
                  <td>{{ $applicant->email }}</td>
                  <td>{{ $applicant->contact }}</td>
                  <td>{{ $applicant->created_at->format('m/d/Y') }}</td>
                  <td style="text-align:center;">
                    <a data-toggle="tooltip" data-placement="bottom" title="Process Applicant"><i id="{{ $applicant->id }}" data-toggle="modal" data-target="#info_app" class="btn btn-default info_applicant">ii</i></a>
                  </td>
                </tr> 
                @else
                @endif
                @endforeach  
            </tbody>
          </table>
      </div>
    </div>
@endsection
