@extends('layouts.master_admission')

@section('title')
COAS - V1.0 || Confirmed/Unconfirmed Applicants
@endsection

@section('sideheader')
<h4>Admission</h4>
@endsection

@yield('sidemenu')

@section('workspace')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Admission</li>
        <li class="active">Confirmed/Unconfirmed Applicants</li>
    </ol>
    <div class="row">
    <div class="container-fluid">@if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success')}}</div>
      @elseif (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>  
    @endif</div>
    <form method="GET" action="{{ route('srchconfirmList') }}">
       {{ csrf_field() }}
        <div class="row"> 
          <div class="col-md-12">
            <div class="container-fluid">
            <div class="searchclub jumbotron">
            <div class="col-md-2">
              <select class="form-control" name="year">
                <option value="">Year</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
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
            <h4>Search Results: {{ $totalSearchResults }} <small><i>Year-<b>{{ request('year') }}</b>, Campus-<b>{{ request('campus') }}</b>, ID-<b>{{ request('admission_id') }}</b>,  Strand-<b>{{ request('strand') }}</b></i></small></h4>
          </div>
          </div>
        </div>
    </form>

    <div class="container-fluid">
    
    <table id="applicant-list" class="display nowrap" style="width:100%">
       <thead>
                <tr>
                    <th>App ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Contact #</th>
                    <th>Status</th>
                    <th>Course</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $applicant)
                @if ($applicant->p_status == 4) 
                <tr>
                  <td>{{ $applicant->admission_id }}</td>
                  <td style="text-transform: uppercase;"><b>{{ $applicant->fname }} {{ substr($applicant->mname,0,1) }}. {{ $applicant->lname }}</b></td>
                  <td>@if ($applicant->type == 1) New @elseif($applicant->type == 2) Returnee @elseif($applicant->type == 3) Transferee @endif</td>
                  <td>{{ $applicant->contact }}</td>
                  <td><small><span class="text-primary">@if ($applicant->interview->remarks == 1) Accepted for Enrolment @else Not accepted for enrolment @endif</span></small></td>
                  <td>{{ $applicant->interview->course }}</td>
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

@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#applicant-list').DataTable( {
          "ordering": false,
          bInfo: false,
          scrollY: '700px', scrollCollapse: true, paging: false,
      });
  });
  </script>
@endsection

<!-- Start Delete Applicant -->
<div class="modal fade bs-example-modal-sm" id="info_app" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
           </button>
           <h4 class="modal-title">Select Transaction</h4>
          </div>
          <div class="modal-body">
            <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-stats" id="btn_dept_interview"></a> Process Pre-Enrolment</p>
            <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-print" id="btn_view_preenrolment"></a> Generate Pre-Enrollment</p>
            <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-check" id="btn_accepted_applicants"></a> Accept Applicant</p>    
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
</div> 
<!-- End Delete Applicant -->
