<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Payroll;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = Payroll::where('company_id', auth()->user()->company->id)->get();
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
            'date' => ['required']
        ]);

        $c = new Payroll();
        $c->date = $request->date;
        $c->company_id = auth()->user()->company->id;
        $c->save();
        return $c;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {

        $employees = Employee::where('company_id', auth()->user()->company->id)
        ->get()->map(function($employee){
            return [
                'name' => $employee->name,
                'basic_salary' => $employee->basic_salary." SAR",
            ];
        });
        
        return $employees;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Payroll $payroll)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payroll $payroll)
    {
        $request->validate([
            'date' => ['required']
        ]);

        $payroll->date = $request->date;
        $payroll->save();
        return $payroll;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payroll $payroll)
    {
        $payroll->delete();
        return "success";
    }
}
