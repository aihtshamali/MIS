<?php
if (! function_exists('calculateMFinancialProgress')) {
     function calculateMFinancialProgress($m_project_progress_id)
    {
        $financial_cost=App\MProjectCost::where('m_project_progress_id',$m_project_progress_id)->orderBy('created_at','desc')->first();
        $financial_progress=0.0;
        // dd($financial_cost->total_release_to_date);
        if(isset($financial_cost->total_release_to_date)&&!$financial_cost->total_release_to_date)
          return 0;
        if($financial_cost && $financial_cost->total_release_to_date!=null && $financial_cost->total_release_to_date!=0.0)
            $financial_progress=($financial_cost->utilization_against_releases/$financial_cost->total_release_to_date)*100;
        return $financial_progress;
    }

  }
if (! function_exists('calculateMPhysicalProgress')) {
   function calculateMPhysicalProgress($m_project_progress_id){
      $kpiCompMapping=App\MPlanKpicomponentMapping::where('m_project_progress_id',$m_project_progress_id)->get();
      $arr=array_fill(0,$kpiCompMapping->count(),0);
      $i=0;
      if(!count($kpiCompMapping))
        return 0;
      foreach($kpiCompMapping as $main)
      {
        foreach($main->MAssignedKpiLevel1 as $lv1){
          foreach($lv1->MAssignedKpiLevel2 as $lv2){
            foreach($lv2->MAssignedKpiLevel3 as $lv3){
              foreach($lv3->MAssignedKpiLevel4 as $lv4){
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
      }
      $sum=0;
      foreach($arr as $val){
        $sum+=$val;
      }

      return $sum/count($arr);
  }
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
