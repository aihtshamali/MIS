<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HrSector;
use App\HrMeetingType;
use App\HrMeetingPDWP;
use App\HrAgenda;
use App\HrMom;
use App\HrDecision;
use App\HrProjectDecision;
use App\HrAttachment;
use App\DispatchLetterDoctype;
use App\DispatchLetterPriority;
use App\DispatchLetter;
use App\DispatchLetterCc;
use App\AgendaType;
use App\HrProjectType;
use App\User;
use App\UserDetail;
use Auth;
use Carbon;
use App\AdpProject;
use JavaScript;
use App\HrMomAttachment;
class AdminHumanResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function dispatch_form()
     {
       $doctypes=DispatchLetterDoctype::all();
       $priorities=DispatchLetterPriority::all();
       $officers=User::select('roles.*','role_user.*','users.*','user_details.sector_id')
       ->leftJoin('user_details','user_details.user_id','users.id')
       ->leftJoin('role_user','role_user.user_id','users.id')
       ->leftJoin('roles','roles.id','role_user.role_id')
       ->orderBy('roles.name','ASC')
       ->where('roles.name','officer')
       ->orWhere('roles.name','directorevaluation')
       ->orWhere('roles.name','directormonitoring')
       ->orWhere('roles.name','manager')
       ->get();
       return view('admin_hr.dispatch.create',compact('doctypes','priorities','officers'));
     }

     public function dispatchLetterCreated(Request $request)
     {
    
      $newDispatch_letter= new DispatchLetter();
      $newDispatch_letter->dispatch_no=$request->dispatch_num;
      $newDispatch_letter->issue_date=$request->date;
      $newDispatch_letter->subject=$request->letter_subject;
      $newDispatch_letter->courier_company=$request->courier_c;
      $newDispatch_letter->post_office=$request->post_office;
      $newDispatch_letter->address_dept=$request->address_dept;
      $newDispatch_letter->remarks=$request->remarks;
      $newDispatch_letter->sender_id=$request->d_Sender;
      $newDispatch_letter->dispatch_letter_priority_id=$request->d_priority;
      $newDispatch_letter->dispatch_letter_doctype_id=$request->d_doctype;
      if($request->hasFile('d_letter_attachment'))
        {
        $meeting_filename = "Dispatch-Letter".$request->dispatch_no;
        $file_path = $request->file('d_letter_attachment')->path();
        $newDispatch_letter->scan_document = base64_encode(file_get_contents($file_path));
        $newDispatch_letter->document_name= $meeting_filename.'.'.$request->file('d_letter_attachment')->getClientOriginalExtension();
        $newDispatch_letter->save();
        }
      foreach($request->cc as $cc)
      {
        $newDispatch_letter_cc = new  DispatchLetterCc();
        $newDispatch_letter_cc->dispatch_letter_id=$newDispatch_letter->id;
        $newDispatch_letter_cc->user_id=$cc;
        $newDispatch_letter_cc->save();
      }  
            
       return redirect()->back();
     }
  
     public function dispatchLetterIndex()
     {
       $letters=DispatchLetter::all();
       foreach($letters as $letter)
       {
        if($letter->document_name)
        { file_put_contents('storage/uploads/projects/dispatch_letters/'.$letter->document_name,base64_decode($letter->scan_document));
        }
      }
       return view('admin_hr.dispatch.index',compact('letters'));
     }

    public function index()
    {
        $meetings = HrMeetingPDWP::all();
        $data = [];
        foreach ($meetings as $meeting) {
          if(count($meeting->HrAgenda)>0){
            $index = $meeting->HrAgenda[0]->financial_year;
            if($index==""){
              $index = "NotAssigned";
            }
            if(isset($data[$index])){
              $data += [
                $index => array_push($data[$index],$meeting),
              ];
            }
            else{
              $data += [
                $index => [$meeting],
              ];
            }
          }
          else{
            $index = "NoAgenda";
            if(isset($data[$index])){
              $data += [
                $index => array_push($data[$index],$meeting),
              ];
            }
            else{
              $data += [
                $index => [$meeting],
              ];
            }
          }
    
        }
        \JavaScript::put([
            'meetings_data' => $data
        ]);
        $agendas=HrAgenda::all();
        // dd($data);
        return view('admin_hr.meeting.index',compact('meetings','agendas','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_year='2018-19';
        $adp = AdpProject::where('financial_year',$current_year)->orderBy('gs_no')->get();
        $sectors = HrSector::all();
        $meeting_types = HrMeetingType::all();
        $agenda_types = AgendaType::all();
        $agenda_statuses = HrProjectType::all();
        \JavaScript::put([
            'projects' => $adp
        ]);

        return view('admin_hr.meeting.create',compact('sectors','meeting_types','agenda_types','agenda_statuses','adp'));
    }
 
    public function saveMoms(Request $request)
    {
      if($request->hasFile('attach_moms'))
      {
      $HRamiG=new HrMomAttachment();
      $HRamiG->hr_agenda_id=$request->hr_agenda_id;
      $meeting_filename = "PDWP-MOM-".$request->hr_agenda_id;
      $file_path = $request->file('attach_moms')->path();
      $HRamiG->attachment_file = base64_encode(file_get_contents($file_path));
      $HRamiG->attachment = $meeting_filename.'.'.$request->file('attach_moms')->getClientOriginalExtension();
      $HRamiG->save();
      }
        return redirect()->back();
    }

    public function financial_year(Request $request)
    {
      $adp = AdpProject::where('financial_year',$request->financial_year)->orderBy('gs_no')->get();
      return $adp;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hr_meeting = new HrMeetingPDWP();
        $hr_meeting->hr_meeting_type_id = $request->type_of_meeting;
        $mytime = Carbon\Carbon::now();
        $hr_meeting->start_time =  date('Y-m-d',strtotime($request->my_date));
        if($request->meeting_no){
            $temp_meeting_no = $request->meeting_no.'-'.$hr_meeting->start_time;
        }
        else{
            $temp_meeting_no = "SM-".$hr_meeting->start_time;
        }
        $hr_meeting->meeting_no = $temp_meeting_no;
        if($request->hasFile('meeting_attachment')){
            $meeting_filename = "PDWP-".$temp_meeting_no.'.'.$request->file('meeting_attachment')->getClientOriginalExtension();
            $file_path = $request->file('meeting_attachment')->path();
            $hr_meeting->attachment_file = base64_encode(file_get_contents($file_path));
            $hr_meeting->attachment = $meeting_filename;
        }
        $hr_meeting->scheduled_date =  date('Y-m-d',strtotime($request->my_date));
        $hr_meeting->status = 1;
        $hr_meeting->save();
        $i = 0;
        $j=0;
        $c=0;
        $agenda_items = explode(',',$request->agenda_type_items[0]);
        foreach($agenda_items as $agenda_type){
            $hr_agenda = new HrAgenda();
            $hr_agenda->agenda_item = $request->agenda_item[$c];
            $hr_agenda->hr_meeting_p_d_w_p_id = $hr_meeting->id;
            $hr_agenda->agenda_type_id = $agenda_type;
            if($agenda_type == 1 || $agenda_type == 2){
                $hr_agenda->hr_project_type_id = $request->agenda_status[$i];
                $hr_agenda->scheme_name = $request->name_of_scheme[$i];
                if(isset($request->adp_no[$i]))
                  $hr_agenda->adp_no = explode(',',$request->adp_no[$i])[0];
                $hr_agenda->financial_year = $request->financial_year;
                $hr_agenda->estimated_cost = $request->estimated_cost[$i];
                $hr_agenda->adp_allocation = $request->adp_allocation[$i];
                $hr_agenda->hr_sector_id = $request->sector[$i];
                $hr_agenda->start_timeofagenda = $request->my_time[$i];
                if(isset($request->adp_no[$i]))
                    $filename = 'WP-'.$hr_meeting->id.'-'. date('Y-m-d',strtotime($request->my_date)).'-'.$hr_agenda->adp_no;
                else
                    $filename = 'WP-'. date('Y-m-d',strtotime($request->my_date)).'-'.$hr_meeting->id.'-'.$request->agenda_item[$c];
                $hr_agenda->save();
                if($request->hasFile('attachments.'. $i)){
                    $hr_attachment = new HrAttachment();
                    $hr_attachment->hr_agenda_id = $hr_agenda->id;
                    $filename = $filename.'.'.$request->file('attachments.'.$i)->getClientOriginalExtension();
                    $file_path = $request->file('attachments.'.$i)->path();
                    $hr_attachment->attachment_file = base64_encode(file_get_contents($file_path));
                    $hr_attachment->attachments = $filename;
                    $hr_attachment->save();
                }
                $i += 1;
                $c += 1;
            }else{
                $hr_agenda->hr_project_type_id = $request->section2_agenda_status[$j];
                $hr_agenda->scheme_name = $request->topic[$j];
                $hr_agenda->hr_sector_id = $request->section2_sector[$j];
                $hr_agenda->start_timeofagenda = $request->section2_my_time[$j];
                $hr_agenda->save();
                $filename = 'WP-'.$temp_meeting_no.$hr_agenda->agenda_item;
                if($request->hasFile('section2_attachments.'. $j)){
                    $hr_attachment = new HrAttachment();
                    $hr_attachment->hr_agenda_id = $hr_agenda->id;
                    $filename = $filename.'.'.$request->file('section2_attachments.'.$j)->getClientOriginalExtension();
                    $file_path = $request->file('section2_attachments.'.$j)->path();
                    $hr_attachment->attachment_file = base64_encode(file_get_contents($file_path));
                    $hr_attachment->attachments = $filename;
                    $hr_attachment->save();
                }
                $j += 1;
                $c += 1;
            }

        }
        return redirect()->route('admin.show',$hr_meeting->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meeting = HrMeetingPDWP::find($id);
        $agendas = $meeting->HrAgenda;
        foreach($agendas as $agenda){
            if($agenda->HrMomAttachment)
            file_put_contents('storage/uploads/projects/meetings_mom/'.$agenda->HrMomAttachment->attachment,base64_decode($agenda->HrMomAttachment->attachment_file));
            if($agenda->HrAttachment){
              file_put_contents('storage/uploads/projects/project_agendas/'.$agenda->HrAttachment->attachments,base64_decode($agenda->HrAttachment->attachment_file));
            }
        }
        $agenda_statuses = HrProjectType::all();
        $adp = AdpProject::where('financial_year','2017-18')->orderBy('gs_no')->get();
        $sectors = HrSector::all();
        $meeting_types = HrMeetingType::all();
        $agenda_types = AgendaType::all();
        $hr_decisions=HrDecision::where('status',1)->get();
        $agendas = $meeting->HrAgenda;
        \JavaScript::put([
            'projects' => $adp
          ]);
        return view('admin_hr.meeting.show',compact('hr_decisions','agendas','meeting','agenda_statuses','adp','sectors','meeting_types','agenda_types'));

    }
    public function DescisionAgenda(Request $req)
    {
      $agendaDecision= HrProjectDecision::where('hr_meeting_p_d_w_p_id',$req->meeting_id)
      ->where('hr_agenda_id',$req->hr_agenda_id)
      ->first();
      if(isset($agendaDecision) && $agendaDecision!=null )
      {
        $agendaDecision->hr_decision_id=$req->agenda_decision;
        $agendaDecision->save();
        return redirect()->back();
       }
       else
       {
        return redirect()->back()->with('error', 'Meeting Not Attended'); 
       }
      
   }
    public function save_agendax(Request $request)
    {
        // dd($request->all());
        $mytime = Carbon\Carbon::now();
        $hr_agenda = new HrAgenda();
        $hr_agenda->agenda_item = $request->agenda_item;
        $hr_agenda->hr_meeting_p_d_w_p_id = $request->meeting_id;
        $hr_agenda->agenda_type_id = $request->agenda_type;
        if($request->agenda_type == 1 || $request->agenda_type == 2){
            $hr_agenda->hr_project_type_id = $request->agenda_status;
            $hr_agenda->scheme_name = $request->name_of_scheme;
            if(isset($request->adp_no))
              $hr_agenda->adp_no = explode(',',$request->adp_no)[0];
            $hr_agenda->financial_year = $request->financial_year;
            $hr_agenda->estimated_cost = $request->estimated_cost;
            $hr_agenda->adp_allocation = $request->adp_allocation;
            $hr_agenda->hr_sector_id = $request->sector;
            $hr_agenda->start_timeofagenda = $request->my_time;
            if(isset($request->adp_no))
              $filename = 'WP-'.$request->meeting_id.'-'. date('Y-m-d',strtotime($mytime)).'-'.$hr_agenda->adp_no ;
            else
            $filename = 'WP-'.$request->meeting_id .'-'. date('Y-m-d',strtotime($mytime)).'-'. $request->agenda_item;
            // dd($hr_agenda);
            $hr_agenda->save();
            if($request->hasFile('attachments')){
              $hr_attachment = new HrAttachment();
              $hr_attachment->hr_agenda_id = $hr_agenda->id;
              $filename = $filename.'.'.$request->file('attachments')->getClientOriginalExtension();
              $file_path = $request->file('attachments')->path();
              $hr_attachment->attachment_file = base64_encode(file_get_contents($file_path));
              $hr_attachment->attachments = $filename;
              $hr_attachment->save();
            }
        }else{
            // dd($mytime->format('Y-m-d H:i:s'));
            $filename = 'WP-'.$request->meeting_id.'-'.$mytime->format('Y-m-d').'-'.$hr_agenda->agenda_item;
            $hr_agenda->hr_project_type_id = $request->section2_agenda_status;
            $hr_agenda->scheme_name = $request->topic;
            $hr_agenda->hr_sector_id = $request->section2_sector;
            $hr_agenda->start_timeofagenda = $request->section2_my_time;
            $hr_agenda->save();
            if($request->hasFile('section2_attachments')){
              $hr_attachment = new HrAttachment();
              $hr_attachment->hr_agenda_id = $hr_agenda->id;
              $filename = $filename.'.'.$request->file('section2_attachments')->getClientOriginalExtension();
              $file_path = $request->file('section2_attachments')->path();
              $hr_attachment->attachment_file = base64_encode(file_get_contents($file_path));
              $hr_attachment->attachments = $filename;
              $hr_attachment->save();
            }
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $meeting = HrMeetingPDWP::find($id);
      $agendas = $meeting->HrAgenda;
      foreach($agendas as $agenda){
          if($agenda->HrMomAttachment)
          file_put_contents('storage/uploads/projects/meetings_mom/'.$agenda->HrMomAttachment->attachment,base64_decode($agenda->HrMomAttachment->attachment_file));
          if($agenda->HrAttachment){
            file_put_contents('storage/uploads/projects/project_agendas/'.$agenda->HrAttachment->attachments,base64_decode($agenda->HrAttachment->attachment_file));
          }
      }
      $agenda_statuses = HrProjectType::all();
      $adp = AdpProject::where('financial_year','2017-18')->orderBy('gs_no')->get();
      $sectors = HrSector::all();
      $meeting_types = HrMeetingType::all();
      $agenda_types = AgendaType::all();
      $agendas = $meeting->HrAgenda;
      $hr_decisions=HrDecision::where('status',1)->get();
      \JavaScript::put([
          'projects' => $adp
      ]);
      // dd($agendas[0]->HrProjectDecision->HrDecision->name);
      // dd($agendas[0]->HrProjectDecision->name);
      return view('admin_hr.meeting.edit',compact('hr_decisions','agendas','meeting','agenda_statuses','adp','sectors','meeting_types','agenda_types'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // dd($request->all());
        $agenda = HrAgenda::find($id);
        $agenda->scheme_name = $request->name_of_scheme;
        $agenda->estimated_cost = $request->estimated_cost;
        $agenda->agenda_item = $request->agenda_item;
        $agenda->adp_no = $request->adp_no;
        $agenda->financial_year = $request->financial_year;
        $agenda->adp_allocation = $request->adp_allocation;
        $hr_attachment_table = $agenda->HrAttachment;
        if($request->hasFile('hr_attachment'))
        {
          $file_path = $request->file('hr_attachment')->path();
          $hr_attachment_table->attachment_file = base64_encode(file_get_contents($file_path));
          $hr_attachment_table->save();
        }
        $agenda->save();

        if($request->hasFile('attach_moms')){
          $HRamiG= HrMomAttachment::where('hr_agenda_id',$request->hr_agenda_id)->first() 
          ? HrMomAttachment::where('hr_agenda_id',$request->hr_agenda_id)->first() : new HrMomAttachment();
          $HRamiG->hr_agenda_id=$request->hr_agenda_id;
          $meeting_filename = "PDWP-MOM-".$request->hr_agenda_id;
          $file_path = $request->file('attach_moms')->path();
          $HRamiG->attachment_file = base64_encode(file_get_contents($file_path));
          $HRamiG->attachment = $meeting_filename.'.'.$request->file('attach_moms')->getClientOriginalExtension();
          $HRamiG->save();
        }
        $agendaDecision= HrProjectDecision::where('hr_meeting_p_d_w_p_id',$request->meeting_id)->where('hr_agenda_id',$request->hr_agenda_id)->first();
        if(isset($agendaDecision) && $agendaDecision!=null )
        {
          $agendaDecision->hr_decision_id=$request->agenda_decision;
          $agendaDecision->save();
         }
         else
         {
          $agendaDecision= new HrProjectDecision();
          $agendaDecision->hr_meeting_p_d_w_p_id=$request->meeting_id;
          $agendaDecision->hr_agenda_id=$request->hr_agenda_id;
          $agendaDecision->hr_decision_id=$request->agenda_decision;
          $agendaDecision->comments_user_id=Auth::id();
          $agendaDecision->save();
         }
         
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function printer(Request $req){
        exec("C:\Program Files (x86)\HP\Digital Imaging\bin\hpqkygrp.exe");
        return "Done";
    }
}
