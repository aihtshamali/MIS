<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\OfficerPositionLog;
use DB;
use Carbon\Carbon;
class UpdateUserPosition extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:UpdateUserPosition';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change User Positon on Daily Basis';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $model = new User();
      $officers = $model->hydrate(
        DB::select(
          'getAllOfficers'
        )
        );
        $total = [];
        $person = [];
        $sum = 0;
        foreach($officers as $officer){
          $sum = 0;
          if($officer->hasRole('officer')){
            if($officer->AssignedProjectTeam){
            $assigned_project = $officer->AssignedProjectTeam;
            foreach($assigned_project as $assign){
              if($assign->assignedProject->project->project_type_id == 1)
                $sum += $assign->assignedProject->project->score*($assign->assignedProject->progress/100);
              }
              array_push($total,$sum);
              array_push($person,$officer->id);
            }
          }
        }
        $maxs = array_keys($total, max($total));
        foreach ($officers as $officer) {
          // code...
          $per = array_search($officer->id,$person);
          $current_score = round($total[$per],0,PHP_ROUND_HALF_UP);
          $actual_current_score = round($total[$per],0,PHP_ROUND_HALF_UP);
          $max_score = round($total[$maxs[0]],0,PHP_ROUND_HALF_UP);
          $actual_max_score = round($total[$maxs[0]],0,PHP_ROUND_HALF_UP);
          if($current_score == $max_score){
            $current_score = 100;
          }
          else{
            $current_score = round($current_score/$max_score*100,0,PHP_ROUND_HALF_UP);
          }

          $rank = 1;
          foreach ($total as $number) {
            $number = round($number/$max_score*100,0,PHP_ROUND_HALF_UP);
            if($current_score < $number){
              $rank++;
            }
          }
          while($OfficerRank=OfficerPositionLog::where('position',$rank)->whereDate('created_at', Carbon::today())->first())
            $rank++;
          $OfficerRank=new OfficerPositionLog();
          $OfficerRank->user_id=$officer->id;
          $OfficerRank->position=$rank;
          $OfficerRank->save();

        }
    }
}
