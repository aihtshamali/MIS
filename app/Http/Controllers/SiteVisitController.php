<?php

namespace App\Http\Controllers;

use App\site_visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteVisitController extends Controller
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
        return view('Site_Visit.Plan_A_Trip.new_trip');
    }
    public function view(){
        return view('Site_Visit.Plan_A_Trip.view_trips');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\site_visit  $site_visit
     * @return \Illuminate\Http\Response
     */
    public function show(site_visit $site_visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\site_visit  $site_visit
     * @return \Illuminate\Http\Response
     */
    public function edit(site_visit $site_visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\site_visit  $site_visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, site_visit $site_visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\site_visit  $site_visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(site_visit $site_visit)
    {
        //
    }
}
