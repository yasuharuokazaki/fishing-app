<?php

namespace App\Http\Controllers\Auth;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class SubmitDatas extends Controller
{
    //
   public function submit(Request $request){
        $img_path=uniqid("img_").".".$request->file('img')->guessExtension();
     
        $request->file('img')->move(storage_path()."/app/public/imgs",$img_path);

        // ddd();
        $result = new Result();
         $result->name=$request->name;
         $result->size=$request->size;
         $result->desc=$request->desc;
         $result->temp=$request->temp;
         $result->water_temp=$request->water_temp;
         $result->wind=$request->wind;
         $result->hPa=$request->hPa;;
         $result->lon=$request->longitude;
         $result->lat=$request->latitude;
         $result->img_path=$img_path;
         $result->get_time=$request->gettime;
         $result->op_flag=$request->op_flag;
         $result->save();
    


        return redirect('/fishing-app')->with('flash_message','save！');
    }

    
}