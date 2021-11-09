<?php

namespace App\Http\Controllers;

use App\Allowance;
use Illuminate\Http\Request;

class AllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = Allowance::where('company_id', auth()->user()->company)->get();
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
            'type' => ['required'],
        ]);

        if($request->price == '' && $request->percentage == ''){
            return response()->json([
                'errors' => [
                    'price' => ['required'],
                    'percentage' => ['required']
                ]
            ], 401);
        }

        $c = new Allowance();
        $c->company_id = auth()->user()->company;
        $c->type = $request->type;
        $c->price = $request->price;
        $c->percentage = $request->percentage;
        $c->name = ['en'=>$request->name_en,'ar'=>$request->name_ar];
        $c->save();
        return $c;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Allowance  $allowance
     * @return \Illuminate\Http\Response
     */
    public function show(Allowance $allowance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Allowance  $allowance
     * @return \Illuminate\Http\Response
     */
    public function edit(Allowance $allowance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Allowance  $allowance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allowance $allowance)
    {
        $request->validate([
            'name_ar' => ['required'],
            'name_en' => ['required'],
            'type' => ['required'],
        ]);

        if($request->price == '' && $request->percentage == ''){
            return response()->json([
                'errors' => [
                    'price' => ['required'],
                    'percentage' => ['required']
                ]
            ], 401);
        }

        $allowance->type = $request->type;
        $allowance->price = $request->price;
        $allowance->percentage = $request->percentage;
        $allowance->name = ['en'=>$request->name_en,'ar'=>$request->name_ar];
        $allowance->save();
        return $allowance;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Allowance  $allowance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allowance $allowance)
    {
        $allowance->delete();
        return "success";
    }
}
