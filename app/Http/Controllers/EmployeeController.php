<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        // $roles = Role::all();
        // dd($data);
        // dd($employee);
        return view('employee.employee')->with(compact('employee'));
        // ->with(compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('employee.add_employee', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee;

        $employee->name = $request->name;
        $employee->address = $request->address;
        $employee->roles_id = $request->role;

        // dd($employee);

        $employee->save();

        return redirect('/employee')->with('status', 'Employee has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $roles = Role::all();
        // dd($data);
        return view('employee.edit_employee',['employee'=>$employee],['roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($request->id);

        $employee->name = $request->name;
        $employee->address = $request->address;
        $employee->roles_id = $request->role;

        $employee->save();

        return redirect('employee')->with('status', 'Employee has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('employee');
    }

    public function archive()
    {
        $employee = Employee::onlyTrashed()->get();

        return view('employee.archive')->with(compact('employee'));
        // ->with(compact('roles'));
    }

    public function forceDestroy($id)
    {
        $employee = Employee::onlyTrashed()->find($id);
        // dd($employee);
        $employee->forceDelete();

        return redirect('archive');
    }
}
