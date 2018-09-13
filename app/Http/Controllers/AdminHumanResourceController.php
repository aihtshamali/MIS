<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HrSector;
use App\HrMeetingType;
use App\HrMeetingPDWP;
use App\HrAgenda;
use App\HrAttachment;
use Carbon;
use App\AgendaType;
use App\HrProjectType;
use App\AdpProject;
use JavaScript;

class AdminHumanResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetings = HrMeetingPDWP::all();
        return view('admin_hr.meeting.index',compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adp = AdpProject::orderBy('gs_no')->get();
        $sectors = HrSector::all();
        $meeting_types = HrMeetingType::all();
        $agenda_types = AgendaType::all();
        $agenda_statuses = HrProjectType::all();
        \JavaScript::put([
            'projects' => $adp
        ]);

        return view('admin_hr.meeting.create',compact('sectors','meeting_types','agenda_types','agenda_statuses','adp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('attachments'));
        // dd($request->hasFile('attachments.'. 1));
        // dd($request->file('attachments.'. 0));
        // else
        // dd('no file');
        // $request->file('attachments.'. 0)->store('public/uploads/projects/project_agendas');
        // dd( ($request->file('attachments.'. 0))->hashName());

        // dd($request->all());
        $hr_meeting = new HrMeetingPDWP();
        $hr_meeting->hr_meeting_type_id = $request->type_of_meeting;
        // $mytime = Carbon\Carbon::now();
        $hr_meeting->start_time =  date('Y-m-d',strtotime($request->my_date));
        if($request->meeting_no){
            $temp_meeting_no = $request->meeting_no.'-'.$hr_meeting->start_time;
        }
        else{
            $temp_meeting_no = "SM-".$hr_meeting->start_time;
        }
        $hr_meeting->meeting_no = $temp_meeting_no;
        if($request->hasFile('meeting_attachment')){
            $meeting_filename = "PDWP-".$temp_meeting_no;
            $request->file('meeting_attachment')->storeAs('public/uploads/projects/pdwp_meeting',$meeting_filename.'.'.$request->file('meeting_attachment')->getClientOriginalExtension());
            $hr_meeting->attachment = $meeting_filename;
        }
        $hr_meeting->scheduled_date =  date('Y-m-d',strtotime($request->my_date));
        $hr_meeting->status = 1;
        $hr_meeting->save();
        $i = 0;
        $j=0;
        $agenda_items = explode(',',$request->agenda_type_items[0]);
        foreach($agenda_items as $agenda_type){
            $hr_agenda = new HrAgenda();
            $hr_agenda->hr_meeting_p_d_w_p_id = $hr_meeting->id;
            $hr_agenda->agenda_type_id = $agenda_type;
            if($agenda_type == 1 || $agenda_type == 2){
                $hr_agenda->hr_project_type_id = $request->agenda_status[$i];
                $hr_agenda->scheme_name = $request->name_of_scheme[$i];
                $hr_agenda->adp_no = explode(',',$request->adp_no[$i])[0];
                $hr_agenda->financial_year = $request->financial_year;
                $hr_agenda->estimated_cost = $request->estimated_cost[$i];
                $hr_agenda->adp_allocation = $request->adp_allocation[$i];
                $hr_agenda->hr_sector_id = $request->sector[$i];
                $hr_agenda->start_timeofagenda = $request->my_time[$i];
                $filename = 'WP-'.$temp_meeting_no.'-'.$hr_agenda->adp_no;

            }else{
                $filename = 'WP-'.$temp_meeting_no;
                $hr_agenda->hr_project_type_id = $request->section2_agenda_status[$i];
                $hr_agenda->scheme_name = $request->topic[$i];
                $hr_agenda->hr_sector_id = $request->section2_sector[$i];
                $hr_agenda->start_timeofagenda = $request->section2_my_time[$i];
                $j += 1;

            }
            
                // if($request->$attachments){
                //     dd($request->attachments[$i]);
                // }
                // dd($request);
                $hr_agenda->save();
                if($request->hasFile('attachments.'. $i)){
                    $hr_attachment = new HrAttachment();
                    $hr_attachment->hr_agenda_id = $hr_agenda->id;
                    $request->file('attachments.'.$i)->storeAs('public/uploads/projects/project_agendas',$filename.'.'.$request->file('attachments.'.$i)->getClientOriginalExtension());
                    $hr_attachment->attachments = $request->file('attachments.'. $i)->hashName();
                    $hr_attachment->save();  
                }  
                if($request->hasFile('section2_attachments.'. $i)){
                    $hr_attachment = new HrAttachment();
                    $hr_attachment->hr_agenda_id = $hr_agenda->id;
                    $request->file('section2_attachments.'.$i)->storeAs('public/uploads/projects/project_agendas',$filename.'.'.$request->file('section2_attachments.'.$i)->getClientOriginalExtension());
                    $hr_attachment->attachments = $request->file('section2_attachments.'. $i)->hashName();
                    $hr_attachment->save();  
                }
            $i += 1;
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
        // dd($meeting);
        $agendas = $meeting->HrAgenda;
        // dd($agendas);
        return view('admin_hr.meeting.show',compact('agendas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
