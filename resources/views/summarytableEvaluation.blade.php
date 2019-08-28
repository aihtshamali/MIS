@extends('summarytable')
@section('title')
Evaluation |
@endsection
@section('styleTags')
@endsection
@section('content')
<div class="margintopbottom">
    <div class="row col-md-12">
        <div class="col-md-3">
            <div class="col-md-6 offset-md-3 toppaddinglogos">
                <img class="widthfull" id="logo" src="{{ asset('dgme.png')}}" alt="DGME Logo" />
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="themecolor text-center text-capitalize">
                Directorate General Monitoring & Evaluation <br />
                Planning & Development Board <br />
                Government of the Punjab
            </h5>
        </div>
        <div class="row col-md-3 toppaddinglogos">
            <div class="col-md-8 offset-md-2">
                <img class="widthfull" id="logo" src="{{ asset('ISO.jpg')}}" alt="ISO Logo" />
            </div>
        </div>
        <div class="col-md-12  text-center">
            <b class="col-md-12 font-14">
                Evaluation report of developmnt projects for July, 2019
            </b>
        </div>
        <div class="col-md-12 text-center">
            <table id="example" class="table table-striped table-bordered" data-page-length="10000" style="width:100%">
                <thead>
                    <tr class="bggrey">
                        <th colspan="10" class="text-center">SUMMARY</th>
                    </tr>
                    <tr>
                        <th class="bggrey">Sr. No</th>
                        <th class="bggrey">Sectors</th>
                        <th class="bggrey">Sub-Sectors</th>
                        <th class="bggrey">Reports Issued By DGM&E<br /><small>(No.)</small></th>
                        <th class="bggrey">Total Cost Of Projects <br /><small>(Rs. Millions)</small></th>
                        <th class="bggrey">Locations<br /><small>(Division Wise)</small></th>
                        <th class="bggrey">SNE Projects <small>(No.)</small></th>
                        <th class="red">Not Successful<br /><small>(No.)</small></th>
                        <th class="yellow">Partially Successful<br /><small>(No.)</small></th>
                        <th class="green">Successful<br /><small>(No.)</small></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>pdkefj9rn plcmwof</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><b>Total</b></td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-12 row margin-top-3per">
            <div class="col-md-4 row">
                <div class="col-md-10 text-right">Not Successful:</div>
                <div class="col-md-2 red fullheight text-center"><b>0</b></div>
            </div>
            <div class="col-md-4 row">
                <div class="col-md-10 text-right">Partially Successful:</div>
                <div class="col-md-2 yellow fullheight text-center"><b>0</b></div>
            </div>
            <div class="col-md-4 row">
                <div class="col-md-10 text-right">Successful:</div>
                <div class="col-md-2 green fullheight text-center"><b>0</b></div>
            </div>
        </div>
        <div class="col-md-12 row margin-top-3per" style="padding: 0% 3%;">
            <h5>Note:</h5>
            <div class="col-md-12 row">
                <div class="col-md-11 ">
                    <b> If neither time, nor scope nor cost parameters are met, the project is Not Successful "</b>
                </div>
                <div class="col-md-1 red "></div>
                <div class="col-md-11 ">
                    <b> If either time, cost or scope parameters are met, the project is Partially Successful</b>
                </div>
                <div class="col-md-1 yellow "></div>
                <div class="col-md-11 ">
                    <b> If time, cost and scope all parameters are met, the Project is Successful</b>
                </div>
                <div class="col-md-1 green "></div>
            </div>
        </div>
        <div class="relativetable margin-top-3per col-md-12 text-center">
            <table id="example_1" data-page-length="10000" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr class="">
                        <th colspan="4" class="bgsky text-center">Project Information</th>
                        <th colspan="4" class="bgsky text-center">Cost</th>
                        <th colspan="2" class="bgsky text-center">Time</th>
                        <th class="bgsky text-center">Scope</th>
                        <th colspan="3" class="bgsky text-center">SNE Details</th>
                        <th class="bglightgreen noborderbottom"></th>
                    </tr>
                    <tr class="bglightgreen">
                        <th>Sr #.</th>
                        <th>Project Name</th>
                        <th>Sub Sectors</th>
                        <th>District</th>
                        <th>Final PC-I Approved Cost <br /><small>Rs. Million</small></th>
                        <th>Released Till Evaluation <br /> <small>Rs. Million</small></th>
                        <th>Total Utilized <br /> <small>Rs. Million</small></th>
                        <th>% Financial Progress<br /><small>(Against PC-I Cost)</small></th>
                        <th>Final Approved Gestaion Period<br /><small>Year</small></th>
                        <th>Actual Gestaion Period<br /><small>Year</small></th>
                        <th>Final Conclusion Of Project</th>
                        <th>SNE</th>
                        <th>Posts</th>
                        <th>O&M Cost</th>
                        <th style="width:5% !important" class="noborderbottom nobordertop">Overall Project</th>
                    </tr>
                    <tr class="bglightgreen">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="lineheightzero"><small class="lineheightone">RS. Million</small></th>
                        <th class="lineheightzero"><small class="lineheightone">RS. Million</small></th>
                        <th class="lineheightzero"><small class="lineheightone">RS. Million</small></th>
                        <th class="lineheightzero"><small class="lineheightone">[Col. Q / (O x 100)]</small></th>
                        <th class="lineheightzero"><small class="lineheightone">Year</th>
                        <th class="lineheightzero"><small class="lineheightone">Year</small></th>
                        <th class="lineheightzero"><small class="lineheightone">Successful/ Partially Successful/ Not Successful</small></th>
                        <th class="lineheightzero"><small class="lineheightone">Yes/No</small></th>
                        <th class="lineheightzero"><small class="lineheightone">(No.)</small></th>
                        <th class="lineheightzero"><small class="lineheightone">RS. Million</small></th>
                        <th class="nobordertop"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td title="Planned(Againt Duration of Project)">fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td class="red"></td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td title="Planned(Againt Duration of Project)">fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td class="green"></td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td title="Planned(Againt Duration of Project)">fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td class="red"></td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td title="Planned(Againt Duration of Project)">fkowhdi</td>
                        <td>fkowhdi</td>
                        <td>fkowhdi</td>
                        <td class="yellow"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection