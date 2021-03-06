<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapApp extends Controller
{
    //
    public function showmap(){
        return view('map-app',[
            'json'=>Result::where('user_id',Auth::id())->orWhere(function($query){
                $query->where('user_id','!=',Auth::id())
                      ->where('op_flag',1);
            })->get()
            ]);
    }

    public function serch(Request $request){
       $keyword = $request->input('keyword');
    //    ddd($keyword);
       if(!empty($keyword)){
            //op_flagが1のデータのうち、keywordを含む結果を返す
            return view('map-app',[
            'json'=>Result::where('op_flag',1)->where('name','LIKE',"%{$keyword}%")
            ->orWhere('desc','LIKE',"%{$keyword}%")->get(),
            ]);   
       }else{
        return view('map-app',[
            'json'=>Result::all(),
            ]);
       }  
    }
}
