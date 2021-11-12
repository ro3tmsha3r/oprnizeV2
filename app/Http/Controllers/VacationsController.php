<?php

namespace App\Http\Controllers;

use App\Vacations;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VacationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacations = Vacations::all()->load(['employee','typeVacation']);
        return $vacations;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'employee_id' => ['required'],
            'typevacation_id' => ['required'],
            'date_start' => ['required','date'],
            'days' => ['required'],
        ]);


        $date_start = Carbon::parse($request->date_start);
        $date_end = $date_start->addDays($request->days);

        $vacations = new Vacations();
        $vacations->employee_id = $request->employee_id;
        $vacations->typevacation_id = $request->typevacation_id;
        $vacations->date_start = $request->date_start;
        $vacations->date_end = $date_end;
        $vacations->days = $request->days;
        $vacations->visa_request = $request->visa_request;
        $vacations->ticket_request = $request->ticket_request;
        $vacations->paid_in_advance = $request->paid_in_advance;
        //$vacations->advance_salary = $request->advance_salary;
        $vacations->save();
        return $vacations;
    }

    public function c(Request $request){

        
        $date_start = Carbon::parse($request->date_start);
        $date_end = $date_start->addDays($request->days);

        $vacations = new Vacations();
        $vacations->employee_id = $request->employee_id;
        $vacations->typevacation_id = $request->typevacation_id;
        $vacations->date_start = $request->date_start;
        $vacations->date_end = $date_end;
        $vacations->days = $request->days;
        $vacations->visa_request = 0;
        $vacations->ticket_request = 0;
        $vacations->paid_in_advance = 0;
        //$vacations->advance_salary = $request->advance_salary;
        $vacations->save();
        return $vacations;

        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Vacations  $vacations
     * @return \Illuminate\Http\Response
     */
    public function show(Vacations $vacations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacations  $vacations
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacations $vacations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacations  $vacations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacations $vacations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacations  $vacations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacations $vacations)
    {
        //
    }
}
