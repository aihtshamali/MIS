@extends('summarytable')
@section('title')
Monitoring |
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
            <b class="col-md-12 font-14 text-capitalize">
                Monitoring report of development projects for Quarter {{date('M -', strtotime('-2 months'))}} {{date('M, Y')}}
            </b>
        </div>
        <div class="col-md-12 text-center">
            <table id="example" class="table table-striped table-bordered" data-page-length="10000" style="width:100%">
                <thead>
                    <tr class="bggrey">
                        <th colspan="9" class="text-center">SUMMARY</th>
                    </tr>
                    <tr>
                        <th class="bggrey">Sr #.</th>
                        <th class="bggrey">Sectors</th>
                        <th class="bggrey">Sub-Sectors</th>
                        <th class="bggrey">Reports Issued By DGM&E<br /><small>No.</small></th>
                        <th class="bggrey">Total Cost Of Projects <br /><small>(Rs. Millions)</small></th>
                        <th class="bggrey">Locations<br /><small>Division Wise</small></th>
                        <th class="red">Project In Critical Phase<br /><small>No.</small></th>
                        <th class="yellow">Projects Need Consideration<br /><small>No.</small></th>
                        <th class="green">Projects within Defined Limits<br /><small>No.</small></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                     $i = 1;   
                    @endphp
                    @foreach ($arr as $key => $item)
                        <tr>
                        <td>{{$i++}}</td>
                        <td><a href="{{route('summarytableMonitoring',['name'=>$key])}}">{{$key}}</a></td>
                        <td>
                        @foreach ($item['sub_sectors'] as $value)
                        @if (isset($value['SHOW']))
                        {{$value['name']}},
                        @endif
                        @endforeach
                        </td>
                    <td>{{count($item['projects'])}}</td>
                        <td>{{$item['cost']}}</td>
                        <td>@foreach ($item['divisions'] as $key3 => $item)
                            {{$key3}},
                        @endforeach</td>
                        <td>{{$arr[$key]['critical']}}</td>
                        <td>{{$arr[$key]['need_consideration']}}</td>
                        <td>{{$arr[$key]['within_limits']}}</td>
                    </tr>
                    @endforeach
                    {{-- <tr>
                        <td>1.</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
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
                    </tr> --}}
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
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-12 row margin-top-3per">
            <div class="col-md-4 row">
                <div class="col-md-10 text-right">Critical Projects:</div>
            <div class="col-md-2 red fullheight text-center"><b>{{$global_critical}}</b></div>
            </div>
            <div class="col-md-4 row">
                <div class="col-md-10 text-right">Projects Need Consideration:</div>
            <div class="col-md-2 yellow fullheight text-center"><b>{{$global_need_consideration}}</b></div>
            </div>
            <div class="col-md-4 row">
                <div class="col-md-10 text-right">Projects within Defined Limits:</div>
            <div class="col-md-2 green fullheight text-center"><b>{{$global_within_limits}}</b></div>
            </div>
        </div>
        <div class="col-md-12 row margin-top-3per" style="padding: 0% 3%;">
            <h5>Note:</h5>
            <div class="col-md-12 row">
                <div class="col-md-11 ">
                    <b> If difference between Planned and Achieved Progress is greater by more than 20%, the Project is "Critical"</b>
                </div>
                <div class="col-md-1 red "></div>
                <div class="col-md-11 ">
                    <b> If difference of Planned & Achieved Progress is between 10% and 20%, the Project "Need Consideration"</b>
                </div>
                <div class="col-md-1 yellow "></div>
                <div class="col-md-11 ">
                    <b> If difference of Planned & Achieved Progress is less than 10%, the Project is "With in Defined Limits"</b>
                </div>
                <div class="col-md-1 green "></div>
            </div>
        </div>
        @if (isset($second_table))

        <div class="relativetable margin-top-3per col-md-12 text-center">
            <table id="example_1" data-page-length="10000" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr class="">
                        <th colspan="5" class="bgsky text-center">Project Information</th>
                        <th colspan="4" class="bgsky text-center">Cost</th>
                        <th colspan="2" class="bgsky text-center">Time</th>
                        <th colspan="2" class="bgsky text-center">Scope</th>
                        <th class="bglightgreen noborderbottom"></th>
                    </tr>
                    <tr class="bglightgreen">
                        <th>Sr #.</th>
                        <th>GS Number</th>
                        <th>Project Name</th>
                        <th>Sub Sectors</th>
                        <th>District</th>
                        <th>Final PC-I Approved Cost<br /><small>Rs. Million</small></th>
                        <th>Released <br /> <small>Rs. Million</small></th>
                        <th>Utilized <br /> <small>Rs. Million</small></th>
                        <th>% Financial Progress<br /><small>(Against PC-I Cost)</small></th>
                        <th>Planned Start</th>
                        <th>Planned End</th>
                        <th colspan="2"> Physical Progress (%)</th>
                        <th style="width:5% !important" class="nobordertop noborderbottom">Status</th>
                    </tr>
                    
                    <tr class="bglightgreen">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="lineheightzero"><small class="lineheightone">[Col. H / F x 100]</small></th>
                        <th class="lineheightzero"><small class="lineheightone">Date</small></th>
                        <th class="lineheightzero"><small class="lineheightone">Date</small></th>
                        <th class="lineheightzero"><small class="lineheightone">Planned (Againt<br />Duration of Project)</small></th>
                        <th class="lineheightzero"><small class="lineheightone">Achieved<br />(As per Actual)</small></th>
                        <th class="nobordertop"></th>
                    </tr>
                </thead>
                <tbody>
                        
                    @foreach ($arr[$second_table]["projects"] as $item)
                    <tr>
                        <td>1.</td>
                        <td>{{$item->gs_num}}</td>
                        <td>{{$item->project_name}}</td>
                        <td>@foreach ($item->AssignedSubSectors as $sub_sectors)
                            {{$sub_sectors->SubSector->name}},
                        @endforeach</td>
                        <td>@foreach ($item->AssignedDistricts as $districts)
                            {{$districts->District->name}},
                        @endforeach</td>
                        <td>{{round($item->final_pc1_approved_cost,2)}}</td>
                        <td>{{round($item->final_released_cost,2)}}</td>
                        <td>{{round($item->final_utilized_cost,2)}}</td>
                        <td>{{$item->financial_progress_against_pc1_cost}}</td>
                        <td>{{date('d-M-Y',strtotime($item->planned_start_date))}}</td>
                        <td>{{date('d-M-Y',strtotime($item->planned_end_date))}}</td>
                        <td>{{round($item->physical_progress_planned,2)}}</td>
                        <td>{{round($item->physical_progress_actual,2)}}</td>
                        <td class="
                        @if ($item->critical)
                            red
                        @elseif($item->need_consideration)
                            yellow
                        @else
                            green
                        @endif
                        "
                        >
                        </td>
                    </tr>
                    @endforeach
                    {{-- <tr>
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
                        <td class="yellow"></td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
        @endif

    </div>
</div>
@endsection