<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubSector;
use App\Sector;

class SubSectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $sub_sectors = SubSector::all();
         return view('SubSector.index',compact('sub_sectors'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
       $sectors = Sector::all();
         return view('SubSector.create',compact('sectors'));
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
       foreach ($request->sub_sectors as $sub_sector) {
         if($sub_sector != null){
       $sub_sector_save = new SubSector();
       $sub_sector_save->name = $sub_sector;
       $sub_sector_save->sector_id = $request->sector_id;
       $sub_sector_save->save();
     }
     }
       return redirect()->route('sub_sector.index');
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         //
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
       SubSector::destroy($id);
       return redirect()->route('sub_sector.index');
     }
}
