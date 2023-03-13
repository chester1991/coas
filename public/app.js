$(document).ready(function()
{
	$(".info_applicant").click(function (event)
	{
		$("#btn_delete_applicant").prop('href', '/emp/admission/applicant/'+event.target.id+'/delete');
	})
	$(".info_applicant").click(function (event)
	{
		$("#btn_confirm_applicant").prop('href', '/emp/admission/applicant/'+event.target.id+'/confirm');
	})
	$(".info_applicant").click(function (event)
	{
		$("#btn_capture_image").prop('href', '/emp/admission/applicant/capture/'+event.target.id);
	})
	$(".info_applicant").click(function (event)
	{
		$("#btn_view_applicant").prop('href', '/emp/admission/applicant/'+event.target.id+'/print');
	})
	$(".info_applicant").click(function (event)
	{
		$("#btn_edit_applicant").prop('href', '/emp/admission/applicant/'+event.target.id+'/edit');
	})
	$(".info_applicant").click(function (event)
	{
		$("#btn_edit_examinee").prop('href', '/emp/admission/examinee/'+event.target.id+'/edit');
	})
	$(".info_applicant").click(function (event)
	{
		$("#btn_schedule_applicant").prop('href', '/emp/admission/applicant/'+event.target.id+'/schedule');
	})
	$(".info_applicant").click(function (event)
	{
		$("#btn_test_result").prop('href', '/emp/admission/examinee/'+event.target.id+'/assignresult');
	})
	$(".info_applicant").click(function (event)
	{
		$("#btn_delete_examinee").prop('href', '/emp/admission/examinee/'+event.target.id+'/delete');
	})

	$(".info_applicant").click(function (event)
	{
		$("#btn_confirm_examinee").prop('href', '/emp/admission/examinee/'+event.target.id+'/confirm');
	})

	$(".info_applicant").click(function (event)
	{
		$("#btn_view_preenrolment").prop('href', '/emp/admission/examinee/'+event.target.id+'/printPreEnrolment');
	})

	$(".info_applicant").click(function (event)
	{
		$("#btn_confirm_pre_enrolment").prop('href', '/emp/admission/examinee/'+event.target.id+'/confirmPreEnrolment');
	})

	$(".info_applicant").click(function (event)
	{
		$("#btn_dept_interview").prop('href', '/emp/admission/confirm/'+event.target.id+'/deptInterview');
	})

	$(".info_applicant").click(function (event)
	{
		$("#btn_accepted_applicants").prop('href', '/emp/admission/confirm/'+event.target.id+'/saveapplicant');
	})
	$(".settings").click(function (event)
	{
		$("#btn_edit_user").prop('href', '/emp/settings/account/'+event.target.id+'/edit');
	})
	$(".settings").click(function (event)
	{
		$("#btn_delete_account").prop('href', '/emp/settings/account/'+event.target.id+'/delete');
	})
	$(".settings").click(function (event)
	{
		$("#btn_changepass_user").prop('href', '/emp/settings/account/'+event.target.id+'/changepass');
	})
});