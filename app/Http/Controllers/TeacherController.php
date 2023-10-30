<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class TeacherController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/teacher/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view("teacher.index", compact("teachers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("teacher.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teaccher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teaccher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teaccher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teaccher)
    {
        //
    }
    
}
