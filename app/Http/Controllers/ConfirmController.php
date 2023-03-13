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

class ConfirmController extends Controller
{
    public function examinee_confirm()
    {
        $confirm = Applicant::orderBy('admission_id', 'desc')->where('p_status', '=', 4)->get();
        return view('admission.conapp.index')
        ->with('confirm', $confirm);
    }
    public function srchconfirmList(Request $request)
    {
        $data = Applicant::where('p_status', '=', 4)->get();
        if ($request->year){$data = $data->where('year',$request->year);}
        if ($request->campus){$data = $data->where('campus',$request->campus);}
        if ($request->admission_id){$data = $data->where('admission_id',$request->admission_id);}
        if ($request->lname){$data = $data->where('lname',$request->lname);}
        if ($request->strand){$data = $data->where('strand',$request->strand);}
        $request->session()->put('recent_search', $data);
        $totalSearchResults = count($data);
        return view('admission.conapp.search_confirm', ['data' => $data,'totalSearchResults' => $totalSearchResults] );
    }
    public function deptInterview($id)
    {
        $applicant = Applicant::find($id);
        return view('admission.conapp.deptInterview')->with('applicant', $applicant);
    }
    public function save_applicant_rating(Request $request, $id)
    {
        $dt = Carbon::now();
        $applicant = Applicant::findOrFail($id);
        $assign = DeptRating::where('admission_id', $applicant->admission_id)
        ->update([
            'rating' => $request->input('rating'), 
            'remarks' => $request->input('remarks'),
            'course' => $request->input('course'),
            'reason' => $request->input('reason'),
            'created_at' => $dt,
        ]);
        return Redirect::route('deptInterview', $id)->with('success','The applicant interview result has been saved');
    }
    public function save_accepted_applicant($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->p_status = 5;
        $dt = Carbon::now();  
        $applicant->updated_at = $dt;
        $applicant->update();
        return back()->with('success', 'Applicant has been accepted for enrolment');
    }
    
}
