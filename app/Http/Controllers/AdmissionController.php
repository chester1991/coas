<?php

namespace App\Http\Controllers;

use Storage;
use Carbon\Carbon;
use App\Models\Applicant;
use App\Models\ApplicantDocs;
use App\Models\ExamineeResult;
use App\Models\DeptRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AdmissionController extends Controller
{
    public function index()
    {
        return view('admission.index');
    }

    public function applicant_list()
    {
        $applicants = Applicant::orderBy('admission_id', 'desc')->get();
        $admissionid = Applicant::orderBy('admission_id', 'desc')->first();
        return view('admission.applicant.list')
        ->with('admissionid', $admissionid)
        ->with('applicants', $applicants);
    }

    public function applicant_add()
    {
        $admissionid = Applicant::orderBy('admission_id', 'desc')->first();
        return view('admission.applicant.add')
        ->with('admissionid', $admissionid);
    }

    public function post_applicant_add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'admissionid' => 'required|unique:applicant_admission,admission_id|numeric',
            'type' => 'required',
            'lastname' => 'required|max:191',
            'firstname' => 'required|max:191',
            'email' => 'required|unique:applicant_admission,email|max:191',
            'gender' => 'required',
            'age' => 'required',
            'contact' => 'required|numeric',
            'preference_1' => 'required',
            'preference_2' => 'required',
        ]);

        if($validator->fails()){
            return Redirect::route('applicant-add')->withErrors($validator)->withInput()->with('fail', 'Error in saving applicant data. Please check the inputs!');}
        else{
            $year = Carbon::now()->format('Y');
            $applicant = new Applicant;
            $applicant->year = $year;
            $applicant->campus = Auth::user()->campus;
            $applicant->admission_id = $request->input('admissionid');
            $applicant->type = $request->input('type');
            $applicant->lname = $request->input('lastname');
            $applicant->fname = $request->input('firstname');
            $applicant->mname = $request->input('mname');
            $applicant->ext = $request->input('ext');
            $applicant->gender = $request->input('gender');
            $applicant->address = $request->input('address');
            $applicant->bday = $request->input('bday');
            $applicant->age = $request->input('age');
            $applicant->contact = $request->input('contact');
            $applicant->email = $request->input('email');
            $applicant->strand = $request->input('strand');  
            $applicant->lstsch_attended = $request->input('lstsch_attended');
            $applicant->strand = $request->input('strand');
            $applicant->suc_lst_attended = $request->input('suc_lst_attended');
            $applicant->course = $request->input('course');
            $applicant->preference_1 = $request->input('preference_1');
            $applicant->preference_2 = $request->input('preference_2');
            $applicant->d_admission = $request->input('d_admission');
            $applicant->time = $request->input('time');
            $applicant->venue = $request->input('venue');
            $dt = Carbon::now();  
            $applicant->created_at = $dt;
            $applicant->save();
            if ($applicant->save()){
             $docs = new ApplicantDocs;
             $docs->admission_id = $applicant->admission_id;
             $docs->r_card = $request->input('r_card');
             $docs->g_moral = $request->input('g_moral');
             $docs->t_record = $request->input('t_record');
             $docs->b_cert = $request->input('b_cert');
             $docs->h_dismissal = $request->input('h_dismissal');
             $docs->m_cert = $request->input('m_cert');
             $docs->created_at = $dt;
             $docs->save();

             $examinee = new ExamineeResult;
             $examinee->admission_id =  $applicant->admission_id;
             $examinee->raw_score = $request->input('raw_score');
             $examinee->percentile = $request->input('percentile');
             $examinee->created_at = $dt;
             $examinee->save();

             $examinee = new DeptRating;
             $examinee->admission_id =  $applicant->admission_id;
             $examinee->created_at = $dt;
             $examinee->save();

            return redirect('emp/admission/applicant/add')->with('success', 'Applicant has been successfully created.');}
            else{
                return Redirect::route('admission-index')->withErrors($validator)->withInput();}
        }

    }
    public function applicant_edit($id)
    {
        $applicant = Applicant::find($id);
        $docs = ApplicantDocs::where('admission_id', '=', $applicant->admission_id)->get();
        return view('admission.applicant.edit')->with('applicant', $applicant)->with('docs', $docs);
    }
    public function applicant_schedule($id)
    {
        $applicant = Applicant::find($id);
        $docs = ApplicantDocs::where('admission_id', '=', $applicant->admission_id)->get();
        return view('admission.applicant.schedule')->with('applicant', $applicant)->with('docs', $docs);
    }
    public function applicant_delete($id)
    {
        $applicant = Applicant::findOrFail($id);
        if ($applicant == null){return redirect('admission/')->with('fail', 'The Applicant does not exist.');}
        if ($applicant->delete()){$docts = ApplicantDocs::where('admission_id','=', $applicant->admission_id)->delete();return back()->with('success', 'The Applicant was successfully deleted.');}else{return back()->with('fail', 'An error was occured while deleting the data.');}
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
    public function srchappList(Request $request)
    {
        $data = Applicant::where('p_status', '=', 1)->get();
        if ($request->year){$data = $data->where('year',$request->year);}
        if ($request->campus){$data = $data->where('campus',$request->campus);}
        if ($request->admission_id){$data = $data->where('admission_id',$request->admission_id);}
        if ($request->lname){$data = $data->where('lname',$request->lname);}
        if ($request->strand){$data = $data->where('strand',$request->strand);}
        $request->session()->put('recent_search', $data);
        $totalSearchResults = count($data);
        return view('admission.applicant.list_search', ['data' => $data,'totalSearchResults' => $totalSearchResults] );
    }
    public function applicant_update(Request $request, $id)
    {
        $data = request()->all();
        $applicant = Applicant::findOrFail($id);
        $applicant->age = $request->input('age');
        $applicant->contact = $request->input('contact');
        $applicant->address = $request->input('address');
        $applicant->email = $request->input('email');
        $applicant->strand = $request->input('strand');
        $applicant->suc_lst_attended = $request->input('suc_lst_attended');
        $applicant->course = $request->input('course');
        $applicant->d_admission = $request->input('d_admission');
        $applicant->time = $request->input('time');
        $applicant->venue = $request->input('venue');
        $applicant->update($data);

        $docs = ApplicantDocs::where('admission_id', $applicant->admission_id)
        ->update([
            'r_card' => $request->input('r_card'), 
            'g_moral' => $request->input('g_moral'),
            'b_cert' => $request->input('b_cert'),
            'm_cert' => $request->input('m_cert'),
            't_record' => $request->input('t_record'),
            'h_dismissal' => $request->input('h_dismissal'),
        ]);

        return Redirect::route('applicant_edit', $id)->with('success','Applicant data has been updated');
    }
    public function applicant_schedule_save(Request $request, $id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->d_admission = $request->input('d_admission');
        $applicant->time = $request->input('time');
        $applicant->venue = $request->input('venue');
        $applicant->update();
        return Redirect::route('applicant_edit', $id)->with('success','Applicant schedule has been saved');
    }
}
