<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubmitDatas extends Controller
{
    //
   public function submit(Request $request){
        $img_path=uniqid("img_").".".$request->file('img')->guessExtension();
     
        $request->file('img')->move(storage_path()."/app/public/imgs",$img_path);
   
        // validation
    $validatedData = $request->validate([
        'gettime'=>'max:255',
        'name'=>'required|string|max:100',
        'size'=>'nullable|numeric|max:500',
        'desc'=>'nullable|string|max:255',
        'temp'=>'nullable|numeric|max:50',
        'water_temp'=>'nullable|numeric|max:50',
        'wind'=>'nullable|numeric|max:10',
        'hPa'=>'nullable|numeric|max:10000',
        'longitude'=>'nullable|numeric|max:1000',
        'latitude'=>'nullable|numeric|max:1000',
        'op_flag'=>'required',
    ]);
        // ddd();
        $result = new Result();
         $result->user_id=Auth::id();

         $result->get_time=$validatedData['gettime'];
         $result->name=$validatedData['name'];
         $result->size=$validatedData['size'];
         $result->desc=$validatedData['desc'];
         $result->temp=$validatedData['temp'];
         $result->water_temp=$validatedData['water_temp'];
         $result->wind=$validatedData['wind'];
         $result->hPa=$validatedData['hPa'];
         $result->op_flag=$validatedData['op_flag'];
         $result->lon=$validatedData['longitude'];
         $result->lat=$validatedData['latitude'];

        //  $result->get_time=$request->gettime;
        //  $result->name=$request->name;
        //  $result->size=$request->size;
        //  $result->desc=$request->desc;
        //  $result->temp=$request->temp;
        //  $result->water_temp=$request->water_temp;
        //  $result->wind=$request->wind;
        //  $result->hPa=$request->hPa;
        //  $result->op_flag=$request->op_flag;
        //  $result->lon=$request->longitude;
        //  $result->lat=$request->latitude;
         $result->img_path=$img_path;
         
         
         $result->save();
    


        return redirect('/fishing-app')->with('flash_message','保存しました。');
    }

    
}