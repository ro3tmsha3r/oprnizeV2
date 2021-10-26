<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $em = Employee::all();
        return $em;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
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
            'username' => ['required', 'string'],
            'email' => ['required', 'string'],
            'name_ar' => ['required', 'string'],
            'name_en' => ['required'],
            'marital' => ['required'],
            'sex' => ['required'],
            'identification_number' => ['required'],
            'job_number' => ['required'],
            'job_title' => ['required'],
            'contract_start_date' => ['required'],
            'vacations_balance' => ['required'],
            'basic_salary' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $employee = new Employee();
        $employee->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $employee->email = $request->email;
        $employee->marital = $request->marital;
        $employee->sex = $request->sex;
        $employee->identification_number = $request->identification_number;
        $employee->job_number = $request->job_number;
        $employee->job_title = $request->job_title;
        $employee->contract_start_date = $request->contract_start_date;
        $employee->vacations_balance = $request->vacations_balance;
        $employee->basic_salary = $request->basic_salary;
        $employee->company_id = $request->company_id;
        $employee->user_id = $user->id;
        $employee->save();

        return $employee;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
