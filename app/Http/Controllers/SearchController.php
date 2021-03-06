<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class SearchController extends Controller
{
    public function dataAjax(Request $request)
    {
        $data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("interests")
                ->select("id","interest_name")
                ->where('interest_name','like',"%$search%")
                ->get();
        }
        return response()->json($data);

    }

    public function dataAjaxProduct(Request $request){
        $data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("products")
                ->select("id","product_name")
                ->where('product_name','like',"%$search%")
                ->get();
        }
        return response()->json($data);
    }
}
