<?php

namespace App\Http\Controllers;

use App\Models\HOD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HODController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'school_id' => 'required|integer|max:13',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:head_teachers',
            'phone' => 'required|string|min:10',
            'password' => 'required|string|min:8',
        ]);
        $hod= HOD::create([
            'school_id' => $request->input('school_id'),
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'password' => Hash::make($request->input('password')),
        ]);
        Auth::guard('hod')->login($hod);
        return redirect()->back()->with('success','HOD Assigned success');
    }

    /**
     * Display the specified resource.
     */
    public function show(HOD $hOD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HOD $hOD)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HOD $hOD)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HOD $hOD)
    {
        //
    }
}
