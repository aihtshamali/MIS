<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdpProject extends Model
{
    protected $fillable = ['scheme_no','lonumcap','lonumrev','old GSNO','gs_no','name_of_scheme','district','tehsil','total_cost' ,'Major Targets' ,'exp_upto_june_2017' ,'Local-Capital' ,'Local-Rev' ,'FAid-Cap' ,'FAid-Rev' ,'type_of_project' ,'sub_type' ,'sec_id' ,  'financial_year'];
}
