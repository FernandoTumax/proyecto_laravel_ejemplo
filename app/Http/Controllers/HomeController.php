<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = Employee::All();
        return view('home',compact('employees'));
    }

    /**
     * Show the administration system.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexAdministracion()
    {
        return view('admin');
    }
}
