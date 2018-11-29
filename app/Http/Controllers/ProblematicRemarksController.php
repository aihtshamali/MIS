<?php

namespace App\Http\Controllers;

use App\ProblematicRemarks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\AssignedProjectActivity;
use App\Events\ProblematicEvent;
class ProblematicRemarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request->all();
      $problematicRema=ProblematicRemarks::where('project_id',$request->project_id)
                            ->where('to_user_id',Auth::id())
                            ->where('read',0)->get();
        foreach ($problematicRema as $remark) {
          $remark->read=1;
          $remark->save();
        }

        $problematicRemarks=new ProblematicRemarks();
        $problematicRemarks->remarks = $request->remarks;
        if($request->activity_id)
          $problematicRemarks->assigned_project_activity_id = $request->activity_id;
        else
          $problematicRemarks->assigned_project_activity_id = ProblematicRemarks::latest()->first()->assigned_project_activity_id;
        $problematicRemarks->project_id = $request->project_id;
        $problematicRemarks->user_id = Auth::id();
        $problematicRemarks->to_user_id = $request->assigned_by;
        // return $problematicRemarks->save();

        if($problematicRemarks->save()){
          // $remarks = $problematicRemarks;

          $remarks=collect(ProblematicRemarks::find($problematicRemarks->id));
          $remarks->put('user',ProblematicRemarks::find($problematicRemarks->id)->User);
          $remarks->put('activity_name',ProblematicRemarks::find($problematicRemarks->id)->AssignedProjectActivity->ProjectActivity->name);
          $remarks= $remarks->toArray();

          // broadcast(new ProblematicEvent($remarks))->toOthers();
          return $remarks;
          // return 'Sent';
        }else {
          return null;
          // return reponse()->json({'status':'Failed'});
          // return 'Message Sending Failed';
        }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function readMessages(Request $request)
    {
      // return $request->all();
      $problematicRemarks=ProblematicRemarks::where('project_id',$request->project_id)
                            ->where('to_user_id',Auth::id())
                            ->where('read',0)
                            ->get();
        foreach ($problematicRemarks as $remark) {
          $remark->read=1;
          $remark->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProblematicRemarks  $problematicRemarks
     * @return \Illuminate\Http\Response
     */
     public function getUnreadCount($id){
       $count=ProblematicRemarks::select('problematic_remarks.*','project_activities.name as activity_name')
             ->leftJoin('assigned_project_activities','problematic_remarks.assigned_project_activity_id','assigned_project_activities.id')
             ->leftJoin('project_activities','assigned_project_activities.project_activity_id','project_activities.id')
             ->where('problematic_remarks.read',0)
             // ->where('problematic_remarks.to_user_id',Auth::id())
             ->where('problematic_remarks.project_id',$id)
              ->count();
          return $count;
     }
    public function show($id)
    {
      $remarks= ProblematicRemarks::select('problematic_remarks.*','project_activities.name as activity_name')
            ->leftJoin('assigned_project_activities','problematic_remarks.assigned_project_activity_id','assigned_project_activities.id')
            ->leftJoin('project_activities','assigned_project_activities.project_activity_id','project_activities.id')
            ->where('problematic_remarks.project_id',$id)->with('user')
             ->orderBy('created_at','ASC')
             ->get();
      return $remarks->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProblematicRemarks  $problematicRemarks
     * @return \Illuminate\Http\Response
     */
    public function edit(ProblematicRemarks $problematicRemarks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProblematicRemarks  $problematicRemarks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProblematicRemarks $problematicRemarks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProblematicRemarks  $problematicRemarks
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProblematicRemarks $problematicRemarks)
    {
        //
    }
}
