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
		<form method="POST" action="{{ route('account_update', $user->id) }}">
	      {{ csrf_field() }}
        @method('PUT')
	      <div class="page-header" style="margin-top: 0px;">
	        <h4>Administer User Data</h4>
	     </div>

	     <div class="col-md-6" {{ ($errors->has('type')) ? 'has-error' : ''}}>
	        <label><span class="label label-default">User Level</span></label>
	        <select class="form-control" name="type" required="">
	          <option value="{{$user->isAdmin}}">@if ($user->isAdmin == 1) Guidance Officer @elseif($user->isAdmin == 2) Guidance Staff @elseif($user->isAdmin == 3) Registrar @elseif($user->isAdmin == 4) Registrar Staff @elseif($user->isAdmin == 5) College Dean @elseif($user->isAdmin == 6) Program Head @elseif($user->isAdmin == 7) College Staff @endif</option>
	          <option value="1" @if (old('type') == 1) {{ 'selected' }} @endif>Guidance Officer</option>
	          <option value="2" @if (old('type') == 2) {{ 'selected' }} @endif>Guidance Staff</option>
	          <option value="3" @if (old('type') == 3) {{ 'selected' }} @endif>Registrar</option>
	          <option value="4" @if (old('type') == 4) {{ 'selected' }} @endif>Registrar Staff</option>
	          <option value="5" @if (old('type') == 5) {{ 'selected' }} @endif>College Dean</option>
	          <option value="6" @if (old('type') == 6) {{ 'selected' }} @endif>Program Head</option>
	          <option value="7" @if (old('type') == 7) {{ 'selected' }} @endif>College Staff</option>
	        </select>
	        @if ($errors->has('type'))
	        <span class="label label-danger">{{ $errors->first('type') }}</span>
	        @endif
	      </div>

       <div class="col-md-6" {{ ($errors->has('campus')) ? 'has-error' : ''}}>
       		<label><span class="label label-default">Campus</span></label>
            <select class="form-control" name="campus" required="">
            <option value="{{$user->campus}}">@if ($user->campus == 'MS') Main @elseif($user->campus == 'SCC') San Carlos @elseif($user->campus == 'VC') Victorias @elseif($user->campus == 'HC') Hinigaran @elseif($user->campus == 'MP') Moises Padilla @elseif($user->campus == 'HinC') Hinobaan @elseif($user->campus == 'SC') Sipalay @elseif($user->campus == 'IC') Ilog @elseif($user->campus == 'CC') Cauayan @endif</option>
            <option value="MC">Main</option>
            <option value="SCC">San Carlos</option>
            <option value="VC">Victorias</option>
            <option value="HC">Hinigaran</option>
            <option value="MP">Moises Padilla</option>
            <option value="HinC">Hinobaan</option>
            <option value="SC">Sipalay</option>
            <option value="IC">Ilog</option>
            <option value="CC">Cauayan</option>
          </select>
        </div>

        <div class="col-md-12" {{ ($errors->has('department')) ? 'has-error' : ''}}>
       		<label><span class="label label-default">Department</span></label>
            <select class="form-control" name="department" required="">
            <option value="{{$user->dept}}">@if ($user->dept == 'CCS') College of Computer Studies @elseif($user->dept == 'COTED') College of Teacher Education @elseif($user->dept == 'CCJE') College of Criminal Justice Education @elseif($user->dept == 'COE') College of Engineering @elseif($user->dept == 'CAF') College of Agriculture and Forestry @elseif($user->dept == 'CBM') College of Business Management @endif</option>
            <option value="CCS">College of Computer Studies</option>
            <option value="COTED">College of Teacher Education</option>
            <option value="CCJE">College of Criminal Justice Education</option>
            <option value="COE">College of Engineering</option>
            <option value="CAF">College of Agriculture and Forestry</option>
            <option value="CBM">College of Business Management</option>
          </select>
        </div>

        <div class="col-md-6" {{ ($errors->has('lastname')) ? 'has-error' : ''}}>
        <label><span class="label label-default">Lastname</span></label>
        <input type="text" name="lastname" class="form-control" value="{{ $user->mname }}">
        @if ($errors->has('lastname'))
        <span class="label label-danger">{{ $errors->first('lastname') }}</span>
        @endif
      </div>
      <div class="col-md-6" {{ ($errors->has('firstname')) ? 'has-error' : ''}}>
        <label><span class="label label-default">Firstname</span></label>
        <input type="text" name="firstname" class="form-control" value="{{ $user->fname }}">
        @if ($errors->has('firstname'))
        <span class="label label-danger">{{ $errors->first('firstname') }}</span>
        @endif
      </div>
      <div class="col-md-6">
        <label><span class="label label-default">Middlename</span></label>
        <input type="text" name="middlename" class="form-control" value="{{ $user->mname }}">
      </div>

      <div class="col-md-6">
      <label><span class="label label-default">Ext.</span></label>
      <select class="form-control" name="ext">
          <option value="{{$user->ext}}">@if ($user->ext == '') N/A @elseif ($user->ext == 'Jr.') Jr. @elseif($user->ext == 'Sr.') Sr. @elseif($user->ext == 'III') III @elseif($user->ext == 'IV') IV @endif</option>
          <option value="">N/A</option>
          <option value="Jr." @if (old('ext') == "Jr.") {{ 'selected' }} @endif>Jr.</option>
          <option value="Sr." @if (old('ext') == "Sr.") {{ 'selected' }} @endif>Sr.</option>
          <option value="III" @if (old('ext') == "III") {{ 'selected' }} @endif>III</option>
          <option value="IV" @if (old('ext') == "IV") {{ 'selected' }} @endif>IV</option>  
        </select>
      </div>

      	<div class="col-md-6">
	      	<div class="form-group" {{ ($errors->has('email')) ? 'has-error' : ''}}>
	         <label><span class="label label-default">Email Address</span></label>
	         <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}">
	            @if($errors->has('email'))
	          {{ $errors->first('email') }}
	            @endif
	       	</div>
   		</div>

   		<div class="col-md-6">
         <div class="form-group" {{ ($errors->has('password')) ? 'has-error' : ''}}>
         <label><span class="label label-default">Password</span></label>
         <input class="form-control" type="password" placeholder="************" disabled="">
         @if($errors->has('password'))
          {{ $errors->first('password') }}
            @endif
         </div>
         </div>

         <div class="col-md-12">
            <div class="text-center">
              <button type="submit" class="col-md-12 btn btn-warning">Update Account</button>
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
