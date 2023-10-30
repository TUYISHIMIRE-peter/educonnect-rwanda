<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::latest()->paginate(10);
        // $schools = [];
        return view("school.index", compact("schools"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required|min:3|string",
            "location"=> "required|string|min:2"
        ]);

        School::create($request->all());
        return redirect()->back()->with("success","School registered");
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        $request->validate([
            "name"=> "required|min:3|string",
            "location"=> "required|string|min:2"
        ]);

        $school->update($request->all());
        return redirect()->back()->with("success","School updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $school->delete();
        return redirect()->back()->with("success","School removed successsfully!");
    }
}
