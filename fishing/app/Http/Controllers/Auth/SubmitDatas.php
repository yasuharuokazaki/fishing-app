<?php

namespace App\Http\Controllers\Auth;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubmitDatas extends Controller
{
    //
   public function submit(Request $request){

    // ddd($request);
        $result = new Result();
         $result->name=$request->name;
         $result->size=$request->size;
         $result->desc=$request->desc;
         $result->temp=$request->temp;
         $result->water_temp=$request->water_temp;
         $result->wind=$request->win;
         $result->hPa=$request->hPa;;
         $result->lon=$request->longitude;
         $result->lat=$request->latitude;
         $result->img_path="testpathishere";
         $result->get_time=$request->gettime;
         $result->op_flag=$request->op_flag;
         $result->save();
    


        return redirect('/fishing-app')->with('flash_message','save！');
    }

    
}