<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View to Bind JavaScript Vars To
    |--------------------------------------------------------------------------
    |
    | Set this value to the name of the view (or partial) that
    | you want to prepend all JavaScript variables to.
    | This can be a single view, or an array of views.
    | Example: 'footer' or ['footer', 'bottom']
    |
    */
    'bind_js_vars_to_this_view' => ['projects/create','admin_hr/meeting/create','executive/home/pems_tab','executive/home/chart_one','executive/home/chart_two','executive/home/chart_three','executive/home/chart_four','executive/home/chart_five','admin_hr/meeting/show','executive/home/chart_six','executive/home/chart_seven','executive/home/chart_eight','executive/home/chart_nine','executive/home/chart_ten','Director.Evaluation.home.pems_tab'],

    /*
    |--------------------------------------------------------------------------
    | JavaScript Namespace
    |--------------------------------------------------------------------------
    |
    | By default, we'll add variables to the global window object. However,
    | it's recommended that you change this to some namespace - anything.
    | That way, you can access vars, like "SomeNamespace.someVariable."
    |
    */
    'js_namespace' => 'window'

];
