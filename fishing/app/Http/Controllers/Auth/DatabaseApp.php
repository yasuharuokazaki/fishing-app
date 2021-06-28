<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\DB;

class DatabaseApp extends Controller
{
     //get results table 
     public function getresults(){
        
        // ddd($results);
        return view('database-app',[
            'results'=>DB::table('results')->simplePaginate(5)
        ]);
        }
}
