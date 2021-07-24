<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Satellite extends Controller
{
    //
    function satellite_view(){
        
        return view('satellite-app');
    }
    
    function specify($ob_date){
        return view('satellite-app',[
            'ob_date'=>$ob_date,
        ]);
    }
}
