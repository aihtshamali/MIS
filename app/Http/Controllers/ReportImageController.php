<?php

namespace App\Http\Controllers;

use App\ReportImage;
use Illuminate\Http\Request;
use Auth;
class ReportImageController extends Controller
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

        if(isset($request->title)){
            $reportImage=new ReportImage();
            $reportImage->m_project_progress_id= $request->m_project_progress_id;
            $reportImage->m_app_attachment_id = $request->report_images;
            $reportImage->user_id=Auth::id();
            $reportImage->title_image=true;
            $reportImage->save();
        }
        else{
            foreach($request->report_images as $imgs){
                $reportImage = new ReportImage();
                $reportImage->m_project_progress_id = $request->m_project_progress_id;
                $reportImage->m_app_attachment_id = $imgs;
                $reportImage->user_id = Auth::id();
                $reportImage->save();
            }
        }
        redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReportImage  $reportImage
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReportImage  $reportImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportImage $reportImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReportImage  $reportImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportImage $reportImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReportImage  $reportImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportImage $reportImage)
    {
        //
    }
}
