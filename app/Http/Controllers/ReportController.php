<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function queryProducts(){
        $result = DB::table('products')
            ->join('ads', 'ads.product_id', '=', 'products.id')
            ->join('locations', 'locations.id', '=', 'ads.location_id')
            ->join('targets', 'targets.ad_id', '=', 'ads.id')
            ->select('ads.id','ads.product_id','products.product_name','products.no_of_order','locations.location_name',
                'ads.budget','ads.duration','targets.gender','targets.min_age','targets.max_age','ads.created_at');
        return $result;
    }

    Public function index(){
        $result= $this->queryProducts();
        $result= $result->get();

        $interests= array();
        foreach ($result as $r){
            $interests[$r->id] = DB::table('interests')
                ->join('interest_items', 'interest_items.interest_id', '=', 'interests.id')
                ->where('interest_items.ad_id',$r->id)
                ->get();
        }

        return view('ads.report.index',compact('result','interests'));
    }

    public function today()
    {
        $result= $this->queryProducts();
        $today = Carbon::today()->toDateString();

        if(($today !=null)) {
            $result= $result->whereDate('ads.created_at', '=', $today)->get();
        }

        $interests= array();
        foreach ($result as $r){
            $interests[$r->id] = DB::table('interests')
                ->join('interest_items', 'interest_items.interest_id', '=', 'interests.id')
                ->where('interest_items.ad_id',$r->id)
                ->get();
        }

        return view('ads.report.index',compact('result','interests'));
    }

    public function last_thirty(){

        $result= $this->queryProducts();
        $from = Carbon::today()->subDays(30)->toDateString();
        $to = Carbon::today()->toDateString();

        if(($from !=null)&&($to !=null)) {
            $result= $result->whereBetween('ads.created_at', [$from, $to])->get();
        }

        $interests = array();
        foreach ($result as $r){
            $interests[$r->id] = DB::table('interests')
                ->join('interest_items', 'interest_items.interest_id', '=', 'interests.id')
                ->where('interest_items.ad_id', $r->id)
                ->get();
        }
        return view('ads.report.index',compact('result','interests'));
    }
    public function last_seven(){

        $result= $this->queryProducts();
        $from = Carbon::today()->subDays(7)->toDateString();
        $to = Carbon::today()->toDateString();
        if(($from !=null)&&($to !=null)) {
            $result= $result->whereBetween('ads.created_at', [$from, $to])->get();
        }
        $interests = array();
        foreach ($result as $r){
            $interests[$r->id] = DB::table('interests')
                ->join('interest_items', 'interest_items.interest_id', '=', 'interests.id')
                ->where('interest_items.ad_id', $r->id)
                ->get();
        }
        return view('ads.report.index',compact('result','interests'));
    }

    public function search(Request $request)
    {
        $result= $this->queryProducts();
        $from= isset($request['start']) ? $request['start'] : null;
        $to= isset($request['end']) ? $request['end'] : null;
        if(($from !=null)&&($to !=null)) {
            $result= $result->whereBetween('ads.created_at', [$from, $to])->get();
        }
        $interests = array();
        foreach ($result as $r){
            $interests[$r->id] = DB::table('interests')
                ->join('interest_items', 'interest_items.interest_id', '=', 'interests.id')
                ->where('interest_items.ad_id', $r->id)
                ->get();
        }
        return view('ads.report.index',compact('result','interests'));
    }

    //create_report controller
    public function filterProducts($result, $product_id,$from,$to){
        if(($from !=null)&& ($to !=null)) {
            $result= $result->whereBetween('ads.created_at', array($from, $to));
        }
        if ($product_id!=null){
            $result= $result->where('products.id', $product_id);
        }
        return $result;
    }

    public function report()
    {
        $products = DB::table('products')->select('id','product_name')->get();
        return view('ads.report.create_report',compact('products'));
    }

    public function generate(Request $request)
    {
        $from= isset($request['start']) ? $request['start'] : null;
        $to= isset($request['end']) ? $request['end'] : null;
        $product_id= isset($request['product_id']) ? $request['product_id'] : null;

        $result= $this->queryProducts();
        $product = $result->where('product_id',$product_id)->select('products.product_name','products.id')->get();

        $result= $this->filterProducts($result, $product_id, $from, $to);
        $sum['order'] = $result->sum('products.no_of_order');
        $sum['budget']= $result->sum('ads.budget');

        return view('ads.report.create_report',compact('sum','product'));
    }

    public function last_seven_report()
    {
        $from = Carbon::today()->subDays(7)->toDateString();
        $to = Carbon::today()->toDateString();

        $product_id= isset($request['product_id']) ? $request['product_id'] : null;

        $result= $this->queryProducts();
        $result= $this->filterProducts($result, $product_id, $from, $to);

        $sum['order'] = $result->sum('products.no_of_order');
        $sum['budget']= $result->sum('ads.budget');

        return view('ads.report.create_report',compact('sum'));
    }

    public function last_thirty_report(){

        $from = Carbon::today()->subDays(30)->toDateString();
        $to = Carbon::today()->toDateString();

        $product_id= isset($request['product_id']) ? $request['product_id'] : null;

        $result= $this->queryProducts();
        $result= $this->filterProducts($result, $product_id, $from, $to);

        $sum['order'] = $result->sum('products.no_of_order');
        $sum['budget']= $result->sum('ads.budget');

        return view('ads.report.create_report',compact('sum'));
    }
    public function today_report(){

        $today = Carbon::today()->toDateString();

        $join = DB::table('products')
            ->join('ads', 'ads.product_id', '=', 'products.id')
            ->select('ads.id','products.product_name','products.no_of_order','ads.created_at');

        if($today !=null) {
            $sum['order'] = $join->whereDate('ads.created_at', '=', $today)->sum('products.no_of_order');
            $sum['budget']= $join->whereDate('ads.created_at', [$today])->sum('ads.budget');
        }
        return view('ads.report.create_report',compact('sum'));
    }
}
