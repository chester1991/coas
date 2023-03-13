@extends('layouts.master_settings')

@section('title')
COAS - V1.0 || Settings
@endsection

@section('sideheader')
<h4>Settings</h4>
@endsection

@yield('style')

@yield('sidemenu')

@section('workspace')
<ol class="breadcrumb">
  <li><a href="{{ route('home') }}" class="list-group-item glyphicon glyphicon-home"></a></li>
  <li>Settings</li>
</ol>
@if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success')}}</div>
  @elseif (Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div> 
@endif

	<div class="col-md-5 jumbotron">
		<form method="POST" action="{{ route('changepassUpdate', $user->id) }}">
	      {{ csrf_field() }}
        @method('PUT')
	      <div class="page-header" style="margin-top: 0px;">
	        <h4>Change Password: {{ $user->fname }} {{ $user->mname }} {{ $user->lname }}</h4>
	     </div>

         <div class="col-md-12">
         <div class="form-group" {{ ($errors->has('password')) ? 'has-error' : ''}}>
         <label><span class="label label-default">New Password</span></label>
         <input class="form-control" type="password" name="password" id="password" placeholder="Enter New Password">
            @if($errors->has('password'))
          {{ $errors->first('password') }}
            @endif
         </div>
        </div>

         <div class="col-md-12">
         <div class="form-group" {{ ($errors->has('confirmation')) ? 'has-error' : ''}}>
         <label><span class="label label-default">Confirm Password</span></label>
         <input class="form-control" type="password" name="confirmation" id="confirmation" placeholder="Confirm New Password">
         @if($errors->has('confirmation'))
          {{ $errors->first('confirmation') }}
            @endif
         </div>
        </div>

        <div class="col-md-12">
            <div class="text-center">
              <button type="submit" class="col-md-12 btn btn-warning">Update Password</button>
            </div>
        </div>

	 	</form>
	</div>

	<div class="col-md-7">
		<div class="scrollme">
        <table id="userSettings" class="display nowrap" style="width:100%">
          <thead>
                <tr>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Campus</th>
                    <th>Office</th>
                    <th>Action</th>
                </tr>
            </thead>
             <tbody>
             	@foreach ($users as $user)
             		<tr>
             			<td>{{ $user->fname }} {{ substr($user->mname,0,1) }}. {{ $user->lname }}</td>
             			<td>@if ($user->isAdmin == 1) Guidance Officer @elseif($user->isAdmin == 2) Guidance Staff @elseif($user->isAdmin == 3) Registrar @elseif($user->isAdmin == 4) Registrar Staff @elseif($user->isAdmin == 5) College Dean @elseif($user->isAdmin == 6) Program Head @elseif($user->isAdmin == 7) College Staff @endif</td>
             			<td>@if ($user->campus == 'MC') Main @elseif($user->campus == 'SCC') San Carlos @elseif($user->campus == 'VC') Victorias @elseif($user->campus == 'HC') Hinigaran @elseif($user->campus == 'MP') Moises Padilla @elseif($user->campus == 'HinC') Hinobaan @elseif($user->campus == 'SC') Sipalay @elseif($user->campus == 'IC') Ilog @elseif($user->campus == 'CC') Cauayan @endif</td>
             			<td>{{ $user->dept }}</td>
             			<td style="text-align:center;">
                    	<a data-toggle="tooltip" data-placement="bottom" title="Process Applicant"><i id="{{ $user->id }}" data-toggle="modal" data-target="#user_settings" class="btn btn-default settings">ii</i></a>
                  		</td>
                	</tr>   
             	@endforeach
            </tbody>
          </table>
        </div>
	</div>
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#userSettings').DataTable( {
        "ordering": false,
        scrollY: '420px', scrollCollapse: true, paging: false,
      });
  });
  </script>
@endsection


<!-- Start Configure Users -->
<div class="modal fade bs-example-modal-sm" id="user_settings" tabindex="-1" role="dialog" aria-hidden="true">
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
            <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-pencil" id="btn_edit_user"></a> Edit User Data</p>
            <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-lock" id="btn_changepass_user"></a> Change Password</p>
            <p><a href="#" type="button" class="btn btn-default glyphicon glyphicon-trash" id="btn_delete_user"></a> Remove User</p>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
</div> 
<!-- End Configure Users -->
