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
use PDF;

class PrntController extends Controller
{
   public function applicant_genPDF(Request $request, $id)
   {
   	$applicant = Applicant::findOrFail($id); 
      view()->share('applicant',$applicant);
      $pdf = PDF::loadView('admission.applicant.print');
      return $pdf->stream();
      return view('admission.applicant.printView')->with('applicant', $applicant);
   }
   public function applicant_print(Request $request, $id)
   {
      $applicant = Applicant::findOrFail($id); 
      return view('admission.applicant.printView')->with('applicant', $applicant);
   }
   public function pre_enrolment_print(Request $request, $id)
   {
      $examinee = Applicant::findOrFail($id); 
      return view('admission.examinee.printPreEnrolmentView')->with('examinee', $examinee);
   }
   public function genPreEnrolment(Request $request, $id)
   {
      $examinee = Applicant::findOrFail($id); 
      view()->share('examinee',$examinee); 
      $pdf = PDF::loadView('admission.examinee.genPreEnrolment')->setPaper('a4', 'portrait');
      return $pdf->stream();
      return view('admission.examinee.printPreEnrolmentView')->with('examinee', $examinee);
   }
   public function applicant_printing()
   {
        return view('admission.reports.applicant');
   }
   public function applicant_reports(Request $request)
   {
         $min = strtotime($request->input('min_date'));
         $new_min = date('Y-m-d H:i:s', $min); 

         $max = strtotime($request->input('max_date'));
         $new_max = date('Y-m-d H:i:s', $max); 

        $data = Applicant::where('p_status', '!=', 5)->get();
        if ($request->year){$data = $data->where('year',$request->year);}
        if ($request->campus){$data = $data->where('campus',$request->campus);}
        if ($request->strand){$data = $data->where('strand',$request->strand);}
        if ($request->min_date){$data = $data->whereBetween('created_at', [$new_min , $new_max]);}
        $request->session()->put('recent_search', $data);
        $totalSearchResults = count($data);
        return view('admission.reports.applicantgen', ['data' => $data,'totalSearchResults' => $totalSearchResults]);
   }
   public function examination_printing()
   {
        return view('admission.reports.examination');
   }
  public function examination_reports(Request $request)
   {
         $min = strtotime($request->input('min_date'));
         $new_min = date('Y-m-d H:i:s', $min); 

         $max = strtotime($request->input('max_date'));
         $new_max = date('Y-m-d H:i:s', $max); 

        $data = Applicant::where('p_status', '=', 2)->get();
        if ($request->year){$data = $data->where('year',$request->year);}
        if ($request->campus){$data = $data->where('campus',$request->campus);}
        if ($request->strand){$data = $data->where('strand',$request->strand);}
        if ($request->min_date){$data = $data->whereBetween('updated_at', [$new_min , $new_max]);}
        $request->session()->put('recent_search', $data);
        $totalSearchResults = count($data);
        return view('admission.reports.examinationgen', ['data' => $data,'totalSearchResults' => $totalSearchResults]);
   }
   public function qualified_printing()
   {
        return view('admission.reports.qualified');
   }
   public function qualified_reports(Request $request)
   {
         $min = strtotime($request->input('min_date'));
         $new_min = date('Y-m-d H:i:s', $min); 

         $max = strtotime($request->input('max_date'));
         $new_max = date('Y-m-d H:i:s', $max); 

        $data = Applicant::where('p_status', '=', 3)->get();
        if ($request->year){$data = $data->where('year',$request->year);}
        if ($request->campus){$data = $data->where('campus',$request->campus);}
        if ($request->strand){$data = $data->where('strand',$request->strand);}
        if ($request->min_date){$data = $data->whereBetween('updated_at', [$new_min , $new_max]);}
        $request->session()->put('recent_search', $data);
        $totalSearchResults = count($data);
        return view('admission.reports.qualifiedgen', ['data' => $data,'totalSearchResults' => $totalSearchResults]);
   }
   public function accepted_printing()
   {
        return view('admission.reports.accepted');
   }
   public function accepted_reports(Request $request)
   {
         $min = strtotime($request->input('min_date'));
         $new_min = date('Y-m-d H:i:s', $min); 

         $max = strtotime($request->input('max_date'));
         $new_max = date('Y-m-d H:i:s', $max); 

        $data = Applicant::where('p_status', '=', 4)->get();
        if ($request->year){$data = $data->where('year',$request->year);}
        if ($request->campus){$data = $data->where('campus',$request->campus);}
        if ($request->strand){$data = $data->where('strand',$request->strand);}
        if ($request->min_date){$data = $data->whereBetween('updated_at', [$new_min , $new_max]);}
        $request->session()->put('recent_search', $data);
        $totalSearchResults = count($data);
        return view('admission.reports.acceptedgen', ['data' => $data,'totalSearchResults' => $totalSearchResults]);
   }
}

