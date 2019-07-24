<?php
// namespace App\Http\Controllers;
// use Illuminate\Http\Request;
// use Illuminate\Support\Collection;
// use App\Http\Controllers\Controller;
// use App\MProjectProgress;

if (! function_exists('calculateMFinancialProgress')) {
     function calculateMFinancialProgress($m_project_progress_id)
    {
        $financial_cost=App\MProjectCost::where('m_project_progress_id',$m_project_progress_id)->orderBy('created_at','desc')->first();
        $financial_progress=0.0;
        if(isset($financial_cost->total_release_to_date) && ($financial_cost->total_release_to_date==null || $financial_cost->total_release_to_date < 1))
        return 0;
        if($financial_cost && $financial_cost->total_release_to_date>0)
            $financial_progress=($financial_cost->utilization_against_releases/$financial_cost->total_release_to_date)*100;
        else
          return 0;
        return $financial_progress;
    }

  }
if (! function_exists('calculateMPhysicalProgress')) {
   function calculateMPhysicalProgress($m_project_progress_id){
    //  dd($cost);
      $mAssignedKpi=App\MAssignedKpi::where('m_project_progress_id',$m_project_progress_id)->get();
      $original_cost=App\MProjectProgress::find($m_project_progress_id)->AssignedProject->Project->ProjectDetail->orignal_cost;
     $financial_cost=App\MProjectCost::where('m_project_progress_id',$m_project_progress_id)->orderBy('created_at','desc')->first();
      // dd($original_cost);
      $arr=array_fill(0,$mAssignedKpi->count(),0);
      $cost=array();
      $i=0;
      $weight=0;
      if(!count($mAssignedKpi))
        return 0;
      foreach($mAssignedKpi as $main)
      {
        foreach($main->MAssignedKpiLevel1 as $lv1)
        {
          foreach($lv1->MAssignedKpiLevel2 as $lv2)
          {
            foreach($lv2->MAssignedKpiLevel3 as $lv3)
            {
              foreach($lv3->MAssignedKpiLevel4 as $lv4)
              {
                $we=$lv4->current_weightage;
                if(!$we)
                  $we=0;
                $arr[$i]+=$we;
              }
                $we=$lv3->current_weightage;
                if(!$we)
                  $we=0;
                $arr[$i]+=$we;
            }
            $we=$lv2->current_weightage;
            if(!$we)
              $we=0;
            $arr[$i]+=$we;
          }
          $we=$lv1->current_weightage;
          if(!$we)
            $we=0;
          $arr[$i]+=$we;
        }
        $i++;
        array_push($cost,$main->cost);
        // dd($cost);
        // $weight+=$main->weightage;
      }
      $sum=0;
      // dd($arr,$cost);
      $phy_prog = array_map( function($cost_arr, $arr_new)
       {
        return $cost_arr * ($arr_new/100);
       }, $cost, $arr);

      $total_phyProgres= array_sum($phy_prog);

      if(!isset($financial_cost->total_release_to_date))
        return 0;

      $physical_progress=($total_phyProgres/$financial_cost->total_release_to_date); 
      return $physical_progress;

  }
}


function calculatePlannedProgress($m_project_progress_id)
{
  $planned_start_date=date_create(App\MProjectProgress::find($m_project_progress_id)->AssignedProject->Project->ProjectDetail->planned_start_date);
  $planned_end_date=date_create(App\MProjectProgress::find($m_project_progress_id)->AssignedProject->Project->ProjectDetail->planned_end_date);
  $interval_period1=date_diff($planned_start_date,$planned_end_date);
  
  //original gestation period
  $planned_gestation_period=$interval_period1->format('%a');
  
  if(!isset(App\MProjectProgress::find($m_project_progress_id)->MProjectDate->first_visit_date)) //if FirstVisit Date not set
    return 0;
  $visit_start_Date=date_create(App\MProjectProgress::find($m_project_progress_id)->MProjectDate->first_visit_date);  
  $interval_period2=date_diff($visit_start_Date,$planned_start_date);
  // planned progress geatation period
  $gestation_period=$interval_period2->format('%a');

  $planned_progress=($gestation_period/$planned_gestation_period)*100;
   return $planned_progress;
   return 0;

  
  
}

function calculateEarnedvalue($m_project_progress_id)
{
  $physical_progress=calculateMPhysicalProgress($m_project_progress_id);
  $financial_cost=App\MProjectCost::where('m_project_progress_id',$m_project_progress_id)->orderBy('created_at','desc')->first();
  $earnedvalue=0;
  if(isset($financial_cost->total_release_to_date))   
    $earnedvalue= ($physical_progress/100) * $financial_cost->total_release_to_date;

  // $original_cost=App\MProjectProgress::find($m_project_progress_id)->AssignedProject->Project->ProjectDetail->orignal_cost;
  // $revised_approved_cost=App\MProjectProgress::find($m_project_progress_id)->AssignedProject->Project->RevisedApprovedCost->last();
  // if($revised_approved_cost)
  // {
    //   $earnedvalue= ($physical_progress/100) * $revised_approved_cost->cost;
    // }
    // else{
      //   $earnedvalue= ($physical_progress/100) * $original_cost;
      // }
      // dd($earnedvalue);
   
    return $earnedvalue;

}

function calculatePlannedValue($m_project_progress_id)
{
  $planned_progress=calculatePlannedProgress($m_project_progress_id);
   $financial_cost=App\MProjectCost::where('m_project_progress_id',$m_project_progress_id)->orderBy('created_at','desc')->first();
   $plannedvalue=0;
  if(isset($financial_cost->total_release_to_date)) 
     $plannedvalue= ($planned_progress/100) * $financial_cost->total_release_to_date;
  // $original_cost=App\MProjectProgress::find($m_project_progress_id)->AssignedProject->Project->ProjectDetail->orignal_cost;
  // $revised_approved_cost=App\MProjectProgress::find($m_project_progress_id)->AssignedProject->Project->RevisedApprovedCost->last();
   
  // if($revised_approved_cost)
  // {
  //   $plannedvalue= ($planned_progress/100) * $revised_approved_cost->cost;
  // }
  // else{
  //   $plannedvalue= ($planned_progress/100) * $original_cost;
  // }
 
  // dd($plannedvalue);
  return $plannedvalue;

}
function costPerformanceindex($m_project_progress_id)
{
  $earned_value=calculateEarnedvalue($m_project_progress_id);
  if(!isset(App\MProjectProgress::find($m_project_progress_id)->MProjectCost->total_release_to_date))
    return 0;
    $actual_consumed_Cost=App\MProjectProgress::find($m_project_progress_id)->MProjectCost->total_release_to_date;
  if($actual_consumed_Cost == 0 || !isset($actual_consumed_Cost))
    return 0;
  $cpi=$earned_value/$actual_consumed_Cost;
  
  return $cpi;

}
function scheduledPerformanceindex($m_project_progress_id)
{
  $earned_value=calculateEarnedvalue($m_project_progress_id);
  $planned_value=calculatePlannedValue($m_project_progress_id);
  if($planned_value==0)
    return $planned_value;
  $spi=$earned_value/$planned_value;
  return $spi;

}

function estimatedAtCompletion($m_project_progress_id)
{
  $cpi=costPerformanceindex($m_project_progress_id);
  
  // $original_cost=App\MProjectProgress::find($m_project_progress_id)->AssignedProject->Project->ProjectDetail->orignal_cost;
  // $revised_approved_cost=App\MProjectProgress::find($m_project_progress_id)->AssignedProject->Project->RevisedApprovedCost->last();
  // if($revised_approved_cost)
  // {
  //   $estimatedAtCompletion= $revised_approved_cost->cost/$cpi ;
  // }
  // else{
  //   $estimatedAtCompletion= $original_cost/$cpi;
  // }
  // dd($earnedvalue);
   $financial_cost=App\MProjectCost::where('m_project_progress_id',$m_project_progress_id)->orderBy('created_at','desc')->first(); 
  if($cpi==0)
    return 0;
  $estimatedAtCompletion=$financial_cost->total_release_to_date/$cpi;
  return $estimatedAtCompletion;
}
function ProjectProgressAcctoDate($project_id){
  $project=App\Project::find(1403);
  $revised_end_date=$project->RevisedEndDate;
  $start_date=$project->ProjectDetail->planned_start_date;
  $end_date=$project->ProjectDetail->planned_end_date;
  if($project->ProjectDetail->revised_start_date){
    $start_date=$project->ProjectDetail->revised_start_date;
  }
  if(count($revised_end_date)){
    $end_date=$revised_end_date->last()->end_date;
  }
  $actual_progress=100/date_diff(date_create($start_date),date_create($end_date))->format('%Y');
  $planned_progress=100/date_diff(date_create($start_date),date_create())->format('%Y');
  return ["planned_progress"=>$planned_progress,"actual_progress"=>$actual_progress];
}
?>
