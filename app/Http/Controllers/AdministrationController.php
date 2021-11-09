<?php

namespace App\Http\Controllers;

use App\Administration;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c = Administration::where('company_id', auth()->user()->company->id)->get();
        return $c;
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
        ]);

        $c = new Administration();
        $c->company_id = auth()->user()->company->id;
        $c->name = ['en'=>$request->name_en,'ar'=>$request->name_ar];
        $c->save();
        return $c;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function show(Administration $administration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function edit(Administration $administration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administration $administration)
    {
        $request->validate([
            'name_ar' => ['required'],
            'name_en' => ['required'],
        ]);

        $administration->name = ['en'=>$request->name_en,'ar'=>$request->name_ar];
        $administration->save();
        return $administration;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administration $administration)
    {
        $administration->delete();
        return "success";
    }
}
