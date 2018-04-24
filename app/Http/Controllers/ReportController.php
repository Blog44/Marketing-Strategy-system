<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    Public function index(){
        $result = DB::table('products')
            ->join('ads', 'ads.product_id', '=', 'products.id')
            ->join('locations', 'locations.id', '=', 'ads.location_id')
            ->join('interests', 'interests.id', '=', 'ads.interest_id')
            ->join('targets', 'targets.ad_id', '=', 'ads.id')
            ->select('ads.id','products.product_name','products.no_of_order','locations.location_name',
                'ads.budget','interests.interest_name','ads.duration','targets.gender','targets.min_age','targets.max_age','ads.created_at')
            ->get();

        return view('ads.report.index',compact('result'));
    }

    public function today(){

        $today = Carbon::today()->toDateString();

        $join = DB::table('products')
            ->join('ads', 'ads.product_id', '=', 'products.id')
            ->join('locations', 'locations.id', '=', 'ads.location_id')
            ->join('interests', 'interests.id', '=', 'ads.interest_id')
            ->join('targets', 'targets.ad_id', '=', 'ads.id')
            ->select('ads.id','products.product_name','products.no_of_order','locations.location_name',
                'ads.budget','interests.interest_name','ads.duration','targets.gender','targets.min_age','targets.max_age','ads.created_at');

        if (($today != null)) {
            $result = $join->whereDate('ads.created_at', '=', $today)->get();
        }
        return view('ads.report.index',compact('result'));
    }

    public function last_thirty(){

        $from = Carbon::today()->subDays(30)->toDateString();
        $to = Carbon::today()->toDateString();
        $join = DB::table('products')
            ->join('ads', 'ads.product_id', '=', 'products.id')
            ->join('locations', 'locations.id', '=', 'ads.location_id')
            ->join('interests', 'interests.id', '=', 'ads.interest_id')
            ->join('targets', 'targets.ad_id', '=', 'ads.id')
            ->select('ads.id','products.product_name','products.no_of_order','locations.location_name',
                'ads.budget','interests.interest_name','ads.duration','targets.gender','targets.min_age','targets.max_age','ads.created_at');

        if(($from !=null)) {
            $result = $join->whereBetween('ads.created_at', [$from, $to])->get();
        }

        return view('ads.report.index',compact('result'));
    }
    public function last_seven(){

        $from = Carbon::today()->subDays(7)->toDateString();
        $to = Carbon::today()->toDateString();
        $join = DB::table('products')
            ->join('ads', 'ads.product_id', '=', 'products.id')
            ->join('locations', 'locations.id', '=', 'ads.location_id')
            ->join('interests', 'interests.id', '=', 'ads.interest_id')
            ->join('targets', 'targets.ad_id', '=', 'ads.id')
            ->select('ads.id','products.product_name','products.no_of_order','locations.location_name',
                'ads.budget','interests.interest_name','ads.duration','targets.gender','targets.min_age','targets.max_age','ads.created_at');

        if(($from !=null)) {
            $result = $join->whereBetween('ads.created_at', [$from, $to])->get();
        }

        return view('ads.report.index',compact('result'));
    }

    public function search(Request $request){

        $from= isset($request['start']) ? $request['start'] : null;
        $to= isset($request['end']) ? $request['end'] : null;

        $join = DB::table('products')
            ->join('ads', 'ads.product_id', '=', 'products.id')
            ->join('locations', 'locations.id', '=', 'ads.location_id')
            ->join('interests', 'interests.id', '=', 'ads.interest_id')
            ->join('targets', 'targets.ad_id', '=', 'ads.id')
            ->select('ads.id','products.product_name','products.no_of_order','locations.location_name',
                'ads.budget','interests.interest_name','ads.duration','targets.gender','targets.min_age','targets.max_age','ads.created_at');

        if(($from !=null)&& ($to !==null)) {

            $result = $join->whereBetween('ads.created_at', [$from, $to])->get();
        }

        return view('ads.report.index',compact('result'));
    }

    public function report(){

        return view('ads.report.create_report');
    }

    public function generate(Request $request){

        $from= isset($request['start']) ? $request['start'] : null;
        $to= isset($request['end']) ? $request['end'] : null;

        $join = DB::table('products')
            ->join('ads', 'ads.product_id', '=', 'products.id')
            ->select('ads.id','products.product_name','products.no_of_order','ads.created_at');

        if(($from !=null)&& ($to !==null)) {

            $sum['order'] = $join->whereBetween('ads.created_at', [$from, $to])->sum('products.no_of_order');
            $sum['budget']= $join->whereBetween('ads.created_at', [$from, $to])->sum('ads.budget');
        }
        return view('ads.report.create_report',compact('sum'));
    }
    public function last_seven_report(){

        $from = Carbon::today()->subDays(7)->toDateString();
        $to = Carbon::today()->toDateString();

        $join = DB::table('products')
            ->join('ads', 'ads.product_id', '=', 'products.id')
            ->select('ads.id','products.product_name','products.no_of_order','ads.created_at');

        if(($from !=null)&& ($to !==null)) {

            $sum['order'] = $join->whereBetween('ads.created_at', [$from, $to])->sum('products.no_of_order');
            $sum['budget']= $join->whereBetween('ads.created_at', [$from, $to])->sum('ads.budget');
        }

        return view('ads.report.create_report',compact('sum'));
    }
    public function last_thirty_report(){

        $from = Carbon::today()->subDays(30)->toDateString();
        $to = Carbon::today()->toDateString();

        $join = DB::table('products')
            ->join('ads', 'ads.product_id', '=', 'products.id')
            ->select('ads.id','products.product_name','products.no_of_order','ads.created_at');

        if(($from !=null)&& ($to !==null)) {

            $sum['order'] = $join->whereBetween('ads.created_at', [$from, $to])->sum('products.no_of_order');
            $sum['budget']= $join->whereBetween('ads.created_at', [$from, $to])->sum('ads.budget');
        }

        return view('ads.report.create_report',compact('sum'));
    }
    public function today_report(){

        $today = Carbon::today()->toDateString();

        $join = DB::table('products')
            ->join('ads', 'ads.product_id', '=', 'products.id')
            ->select('ads.id','products.product_name','products.no_of_order','ads.created_at');

        if(($today !=null)) {

            $sum['order'] = $join->whereDate('ads.created_at', '=', $today)->sum('products.no_of_order');
            $sum['budget']= $join->whereDate('ads.created_at', [$today])->sum('ads.budget');
        }
        return view('ads.report.create_report',compact('sum'));
    }


}
