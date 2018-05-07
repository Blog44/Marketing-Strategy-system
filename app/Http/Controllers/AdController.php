<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Interest;
use App\Location;
use App\Product;
use App\Target;
use App\Interest_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::table('products')
            ->join('ads', 'ads.product_id', '=', 'products.id')
            ->join('locations', 'locations.id', '=', 'ads.location_id')
            ->select('ads.id','products.product_name','products.no_of_order','locations.location_name',
                'ads.budget')
            ->get();

        $interests= array();
        foreach ($result as $r){
            $interests[$r->id] = DB::table('interests')
                ->join('interest_items', 'interest_items.interest_id', '=', 'interests.id')
                ->where('interest_items.ad_id',$r->id)
                ->get();
        }

        return view('ads.index', compact('result','interests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = DB::table('products')->select('id','product_name')->get();
        $locations = DB::table('locations')->select('id','location_name')->get();
       $interests = DB::table('interests')->select('id','interest_name')->get();
        return view('ads.create', compact('products','locations','interests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'budget'=>'required|integer',
            'duration'=>'required|integer',
            'gender'=>'required',
            'min_age'=>'required|integer',
            'max_age'=>'required|integer',
        ]);
        $ad = new Ad();
        $ad->product_id= $request->input('product_id');
        $ad->location_id=$request->input('location_id');

        $ad->budget=$request->input('budget');
        $ad->duration=$request->input('duration');
        $ad->save();

        $ads = DB::table('ads')->select('ads.id')->orderBy('created_at','desc')->first();

        $interest_id = $request['interest_id'];

        foreach($interest_id as $item){
            $data['ad_id']= $ads->id;
            $data['interest_id'] = $item;
            Interest_Item::create($data);
        }

        $tar = new Target();
        $tar->ad_id=$ads->id;
        $tar->gender=$request->input('gender');
        $tar->min_age=$request->input('min_age');
        $tar->max_age=$request->input('max_age');
        $tar->save();

        return redirect()->to('ads');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $results = DB::table('products')
            ->join('ads', 'ads.product_id', '=', 'products.id')
            ->join('locations', 'locations.id', '=', 'ads.location_id')
            ->join('targets', 'targets.ad_id', '=', 'ads.id')
            ->select('ads.id','products.product_name','products.no_of_order','locations.location_name',
                'ads.budget','ads.duration','targets.gender','targets.min_age','targets.max_age')
            ->where('ads.id', $id)
            ->get();

        $interests= array();
        foreach($results as $r){
            $interests[$r->id] = DB::table('interests')
                ->join('interest_items', 'interest_items.interest_id', '=', 'interests.id')
                ->where('interest_items.ad_id',$r->id)
                ->get();
        }

        return view('ads.show',compact('ads','results','interests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::where('id',$id)->first();

        $product_name = Product::where('id',$ad->product_id)->first(['product_name']);
        $product = Product::all();

        $target =DB::table('targets')
            ->select('min_age','max_age','gender')
            ->where('ad_id',$ad->id)
            ->first();

        $location_name = Location::where('id',$ad->location_id)->first(['location_name']);
        $locations = Location::all();

        $interest= array();
            $interest = DB::table('interests')
                ->join('interest_items', 'interest_items.interest_id', '=', 'interests.id')
                ->where('interest_items.ad_id',$ad->id)
                ->pluck('interests.interest_name','interests.id');

        $interests = DB::table('interests')->select('id','interest_name')->get();

        return view('ads.edit', compact('ad','target','location_name','locations','interest',
            'interests','product','product_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ad = Ad::find($id);
        $ad->budget = $request->input('budget');
        $ad->duration = $request->input('duration');
        $ad->save();

        $pd = Product::where('id', $ad->product_id)->first();
        $pd->product_name = $request->input('product_name');
        $pd->save();

        $tar = Target::where('ad_id', $ad->id)->first();
        $tar->gender = $request->input('gender');
        $tar->min_age = $request->input('min_age');
        $tar->max_age = $request->input('max_age');
        $tar->save();

        $interest = $request['interest_id'];
        //delete all from interest item where ad_id is id
        $check = DB::table('interest_items')
            ->where('interest_items.ad_id', $id)
            ->delete();
        if ($check){
            foreach ($interest as $item) {
                $data['ad_id'] = $ad->id;
                $data['interest_id'] = $item;
                Interest_Item::create($data);
            }
        }

        $loc= Location::where('id',$ad->location_id)->first();
        $loc->location_name=$request->input('location_name');
        $loc->save();

        return redirect()->to('ads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=Ad::find($id);
        $c->delete();

        $check = DB::table('targets')
                ->where('targets.ad_id', $id)
                ->delete();

        $checks = DB::table('interest_items')
                ->where('interest_items.ad_id', $id)
                ->delete();

        if($c && $check && $checks){
            return redirect()->to('ads');
        }
        else
            echo('Delete unsuccessful');
    }
}
