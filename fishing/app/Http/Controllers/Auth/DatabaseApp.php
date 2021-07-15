<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DatabaseApp extends Controller
{
     //get results table 
     public function getresults(User $user){
        
        // ddd($results);
        return view('database-app',[
            'results'=>User::find(Auth::id())->result()->paginate(5),
            // DB::table('results')->where('user_id',Auth::id())->simplePaginate(5)
        ]);
        }

    public function delete($id){
            Result::destroy($id);
            return redirect('/database_app')->with('flash_message',"削除しました。");
    }

    public function edit(Request $request){
        $id=$request->id;
        
        return view('database-edit',[
            'predata'=> Result::find($id),
        ]);
    }

    public function modify(Request $request){

        $validatedData = $request->validate([
            'get_time'=>['max:255'],
            'name'=>['required|string|max:100'],
            'size'=>['nullable|numeric|max:5'],
            'desc'=>['nullable|string|max:255'],
            'temp'=>['nullable|numeric|max:10'],
            'water_temp'=>['nullable|numeric|max:10'],
            'wind'=>['nullable|numeric|max:10'],
            'hPa'=>['nullable|numeric|max:10'],
            'op_flag'=>['required'],
        ]);

        $result= Result::find($request->id);
        $result->get_time=$validatedData['get_time'];
        $result->name=$validatedData['name'];
        $result->size=$validatedData['size'];
        $result->desc=$validatedData['desc'];
        $result->temp=$validatedData['temp'];
        $result->water_temp=$validatedData['water_temp'];
        $result->wind=$validatedData['wind'];
        $result->hPa=$validatedData['hPa'];
        $result->op_flag=$validatedData['op_flag'];

    //    $result= Result::find($request->id);
    //    $result->get_time=$request->get_time;
    //    $result->name=$request->name;
    //    $result->size=$request->size;
    //    $result->desc=$request->desc;
    //    $result->temp=$request->temp;
    //    $result->water_temp=$request->water_temp;
    //    $result->wind=$request->wind;
    //    $result->hPa=$request->hPa;
    //    $result->op_flag=$request->op_flag;
    //    ddd($result);
       $result->save();

       return redirect("/database_app")->with('flash_message',"訂正しました。");
    }

    
}
