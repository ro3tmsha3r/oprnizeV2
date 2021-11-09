<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = City::where('company_id', auth()->user()->company->id)->get();
        return $c;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name_ar' => ['required'],
            'name_en' => ['required'],
            'country_id' => ['required'],
        ]);
        $c = new City();
        $c->company_id = auth()->user()->company->id;
        $c->administration_id = $request->country_id;
        $c->name = ['en'=>$request->name_en,'ar'=>$request->name_ar];
        $c->save();
        return $c;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'name_ar' => ['required'],
            'name_en' => ['required'],
            'country_id' => ['required'],
        ]);

        $city->country_id = $request->country_id;
        $city->name = ['en'=>$request->name_en,'ar'=>$request->name_ar];
        $city->save();
        return $city;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return "success";
    }
}
