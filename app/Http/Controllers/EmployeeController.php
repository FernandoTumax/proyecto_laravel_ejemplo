<?php

namespace App\Http\Controllers;

use App\Employee;
use App\JobTitle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $jobs = JobTitle::all();
        return view('employees.create', compact('jobs'));
    }


    public function store(Request $request)
    {
        $employee = Employee::create($request->all());

        return redirect()->route('home');
    }


    public function show(Employee $employee)
    {

        return view('employees.show', compact('employee'));
    }


    public function edit(Employee $employee)
    {


        $jobs = JobTitle::all();


        return view('employees.edit',compact('jobs','employee'));

    }


    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('employees.show',$employee);
    }


    public function validCui(Request $request)
    {
        $cui = $request->get('cui_id');
        $employees = DB::table('employees')
            ->where('cui', $request->get('cui'))
            ->where('id', '!=', $cui)
            ->first();

        return isset($employees) ? 'false' : 'true';
    }

    public function validNit(Request $request)
    {
        $nit = $request->get('nit_id');
        $employees = DB::table('employees')
            ->where('nit', $request->get('nit'))
            ->where('id', '!=', $nit)
            ->first();

        return isset($employees) ? 'false' : 'true';
    }

    public function destroy(Employee $employee)
    {

        $employee->delete();
        return redirect()->route('home');

    }
}
