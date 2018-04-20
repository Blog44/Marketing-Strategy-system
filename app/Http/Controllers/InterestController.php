<?php

namespace App\Http\Controllers;

use App\Interest;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interest = Interest::latest()->get();

        return view('ads.interest.index', compact('interest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.interest.create',compact('interest'));
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
            'interest_name'=>'required',
        ]);
        //dd($request->all());
        $interest = new Interest();

        $interest->interest_name=$request->input('interest_name');

        $interest->save();

        return redirect()->to('interest');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function show(Interest $interest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $int = Interest::find($id);

        return view('ads.interest.edit', compact('int'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'interest_name'=>'required',
        ]);

        $int = Interest::find($id);
        $int->interest_name=$request->input('interest_name');

        $int->save();

        return redirect()->to('interest');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $int = Interest::find($id);

        $check = $int->delete();
        if($check)
        return redirect()->to('interest');
        else
            dd($check);
    }
}
