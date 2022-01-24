<?php

namespace App\Http\Controllers;
use App\Models\Employee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $employee = Employee::all();
        // $roles = Role::all();
        // dd($data);
        // dd($employee);
        return view('dashboard')->with(compact('employee'));
    }
}
