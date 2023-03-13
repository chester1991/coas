@extends('layouts.master_settings')

@section('title')
COAS - V1.0 || User List
@endsection

@section('sideheader')
<h4>Settings</h4>
@endsection

@yield('sidemenu')

@section('workspace')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}" class="list-group-item glyphicon glyphicon-home"></a></li>
        <li>Settings</li>
        <li class="active">User List</li>
    </ol>
    <div class="row">
    <p>@if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success')}}</div>
      @elseif (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>  
    @endif</p>

    </div>
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'excel', 'pdf', 'print'
          ]
      });
  });
  </script>
@endsection