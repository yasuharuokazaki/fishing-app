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
       $result= Result::find($request->id);
       $result->get_time=$request->get_time;
       $result->name=$request->name;
       $result->size=$request->size;
       $result->desc=$request->desc;
       $result->temp=$request->temp;
       $result->water_temp=$request->water_temp;
       $result->wind=$request->wind;
       $result->hPa=$request->hPa;
       $result->save();

       return redirect("/database_app")->with('flash_message',"訂正しました。");
    }
}
