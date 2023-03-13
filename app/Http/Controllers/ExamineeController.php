<?php

namespace App\Http\Controllers;

use Storage;
use Carbon\Carbon;
use App\Models\Applicant;
use App\Models\ApplicantDocs;
use App\Models\ExamineeResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ExamineeController extends Controller
{
	public function examinee_list()
    {
        $examinees = Applicant::orderBy('admission_id', 'desc')->where('p_status', '=', 2)->get();
        $admissionid = Applicant::orderBy('admission_id', 'desc')->first();
        return view('admission.examinee.list')
        ->with('admissionid', $admissionid)
        ->with('examinees', $examinees);
    }
    public function srchexamineeList(Request $request)
    {
        $data = Applicant::where('p_status', '=', 2)->get();
        if ($request->year){$data = $data->where('year',$request->year);}
        if ($request->campus){$data = $data->where('campus',$request->campus);}
        if ($request->admission_id){$data = $data->where('admission_id',$request->admission_id);}
        if ($request->lname){$data = $data->where('lname',$request->lname);}
        if ($request->strand){$data = $data->where('strand',$request->strand);}
        $request->session()->put('recent_search', $data);
        $totalSearchResults = count($data);
        return view('admission.examinee.list_search', ['data' => $data,'totalSearchResults' => $totalSearchResults] );
    }

    public function assignresult($id)
    {
        $assignresult = Applicant::findOrFail($id);
        $assign = ExamineeResult::where('admission_id', '=', $assignresult->admission_id)->get();
        $per = ExamineeResult::where('admission_id', '=', $assignresult->admission_id)->get();
        return view('admission.examinee.result')->with('assignresult',$assignresult )->with('assign',$assign)->with('per',$per);
    }

    public function examinee_delete($id)
    {
        $examinee = Applicant::findOrFail($id);
        if ($examinee == null){return redirect('admission/')->with('fail', 'The Applicant does not exist.');}
        if ($examinee->delete())
        {
            $docts = ApplicantDocs::where('admission_id','=', $examinee->admission_id)->delete();

            $docts = ExamineeResult::where('admission_id','=', $examinee->admission_id)->delete();

            return back()->with('success', 'The Applicant was successfully deleted.');}
            else{

            return back()->with('fail', 'An error was occured while deleting the data.');
        }
    }

    public function examinee_result_save(Request $request, $id)
    {
        $examinee = Applicant::findOrFail($id);
        $assign = ExamineeResult::where('admission_id', $examinee->admission_id)
        ->update([
            'raw_score' => $request->input('raw_score'), 
            'percentile' => $request->input('percentile'),
        ]);
        return Redirect::route('applicant_edit', $id)->with('success','The examinee result has been saved');
    }

    public function examinee_confirm($id)
    {
        $examinee = Applicant::findOrFail($id);
        $examinee->p_status = 3;
        $dt = Carbon::now();  
        $examinee->updated_at = $dt;
        $examinee->update();
        return back()->with('success', 'Examinee result was officially confirmed');
    }

    public function result_list()
    {
       $examinees = Applicant::orderBy('admission_id', 'desc')->where('p_status', '=', 3)->get();
        return view('admission.examinee.result_list')
        ->with('examinees', $examinees);
    }
    public function srchexamineeResultList(Request $request)
    {
        $data = Applicant::where('p_status', '=', 3)->get();
        if ($request->year){$data = $data->where('year',$request->year);}
        if ($request->campus){$data = $data->where('campus',$request->campus);}
        if ($request->admission_id){$data = $data->where('admission_id',$request->admission_id);}
        if ($request->lname){$data = $data->where('lname',$request->lname);}
        if ($request->strand){$data = $data->where('strand',$request->strand);}
        $request->session()->put('recent_search', $data);
        $totalSearchResults = count($data);
        return view('admission.examinee.result_search', ['data' => $data,'totalSearchResults' => $totalSearchResults] );
    }
    public function applicant_confirm($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->p_status = 2;
        $dt = Carbon::now();  
        $applicant->updated_at = $dt;
        $applicant->update();
        return back()->with('success', 'Applicant was officially confirmed for examination');
    }
    public function confirmPreEnrolment($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->p_status = 4;
        $dt = Carbon::now();  
        $applicant->updated_at = $dt;
        $applicant->update();
        return back()->with('success', 'Applicant was officially confirmed for Pre-Enrolment');
    }
    public function examinee_edit($id)
    {
        $applicant = Applicant::find($id);
        $docs = ApplicantDocs::where('admission_id', '=', $applicant->admission_id)->get();
        return view('admission.examinee.edit')->with('applicant', $applicant)->with('docs', $docs);
    }
}
