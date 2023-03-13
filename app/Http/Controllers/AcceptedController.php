<?php

namespace App\Http\Controllers;

use Storage;
use Carbon\Carbon;
use App\Models\Applicant;
use App\Models\ApplicantDocs;
use App\Models\DeptRating;
use App\Models\ExamineeResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AcceptedController extends Controller
{
    public function applicant_accepted()
    {
        $confirm = Applicant::orderBy('admission_id', 'desc')->where('p_status', '=', 5)->get();
        return view('admission.acceptedapp.index')
        ->with('confirm', $confirm);
    }
    public function srchacceptedList(Request $request)
    {
        $data = Applicant::where('p_status', '=', 5)->get();
        if ($request->year){$data = $data->where('year',$request->year);}
        if ($request->campus){$data = $data->where('campus',$request->campus);}
        if ($request->admission_id){$data = $data->where('admission_id',$request->admission_id);}
        if ($request->lname){$data = $data->where('lname',$request->lname);}
        if ($request->strand){$data = $data->where('strand',$request->strand);}
        $request->session()->put('recent_search', $data);
        $totalSearchResults = count($data);
        return view('admission.acceptedapp.search_accepted', ['data' => $data,'totalSearchResults' => $totalSearchResults] );
    }
}
