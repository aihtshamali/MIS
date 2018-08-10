<?php

namespace App\Http\Controllers;

use App\ProblematicRemarks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
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
      // dd($request->all());
        $problematicRemarks=new ProblematicRemarks();
        $problematicRemarks->remarks = $request->remarks;
        $problematicRemarks->project_activity_id = $request->activity_id;
        $problematicRemarks->project_id = $request->project_id;
        $problematicRemarks->from_user_id = Auth::id();
        $problematicRemarks->to_user_id = $request->assigned_by;
        $problematicRemarks->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProblematicRemarks  $problematicRemarks
     * @return \Illuminate\Http\Response
     */
    public function show(ProblematicRemarks $problematicRemarks)
    {
        //
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
