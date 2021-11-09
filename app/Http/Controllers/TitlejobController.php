<?php

namespace App\Http\Controllers;

use App\Titlejob;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TitlejobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = Titlejob::where('company_id', auth()->user()->company)->get();
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
            'section_id' => ['required'],
        ]);
        $c = new Titlejob();
        $c->company_id = auth()->user()->company->id;
        $c->section_id = $request->section_id;
        $c->name = ['en'=>$request->name_en,'ar'=>$request->name_ar];
        $c->save();
        return $c;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Titlejob  $titlejob
     * @return \Illuminate\Http\Response
     */
    public function show(Titlejob $titlejob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Titlejob  $titlejob
     * @return \Illuminate\Http\Response
     */
    public function edit(Titlejob $titlejob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Titlejob  $titlejob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Titlejob $titlejob)
    {
        $request->validate([
            'name_ar' => ['required'],
            'name_en' => ['required'],
            'section_id' => ['required'],
        ]);


        $titlejob->section_id = $request->section_id;
        $titlejob->name = ['en'=>$request->name_en,'ar'=>$request->name_ar];
        $titlejob->save();
        return $titlejob;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Titlejob  $titlejob
     * @return \Illuminate\Http\Response
     */
    public function destroy(Titlejob $titlejob)
    {
        $titlejob->delete();
        return "success";
    }
}
