<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periods = Period::all();
        return view('period.index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('period.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'short_name' => 'required|max:200',
            'long_name' => 'required|max:200',
            'start_date' => 'required|date',
            'final_date' => 'required|date',
            'status' => 'required|max:100',
        ]);

        Period::create($data);

        return redirect()->route('periods.index')->with('success', 'Periodo creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Period $period)
    {
        return view('period.show', compact('period'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Period $period)
    {
        return view('period.edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Period $period)
    {
        $data = $request->validate([
            'short_name' => 'required|max:200',
            'long_name' => 'required|max:200',
            'start_date' => 'required|date',
            'final_date' => 'required|date',
            'status' => 'required|max:100',
        ]);

        $period->update($data);

        return redirect()->route('periods.index')->with('success', 'Periodo actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Period $period)
    {
        $period->delete();

        return redirect()->route('periods.index')->with('success', 'Periodo eliminado satisfactoriamente.');
    }
}