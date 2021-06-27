<?php

namespace App\Http\Controllers\Auth;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubmitDatas extends Controller
{
    //
   public function submit(){

  
        $result = new Result();
         $result->name="test";
         $result->size=60;
         $result->desc="this is test";
         $result->temp=12.3;
         $result->water_temp=10.3;
         $result->wind=5.0;
         $result->hPa=1000.0;
         $result->lon=148.00;
         $result->lat=35.0;
         $result->img_path="testpathishere";
         $result->get_time="2021-06-27";
         $result->save();
    


        return redirect('fishing-app')->with('flash_message','保存が完了しました');
    }

    
}