<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $instructors = Instructor::all();
        return view('instructor.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:200',
            'lastname' => 'required|max:200',
            'education' => 'required|max:200',
            'rfc' => 'required|max:200',
            'sex' => 'required|max:100',
        ]);

        Instructor::create($data);

        return redirect()->route('instructors.index')->with('success', 'GATOGATOGATO creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        return view('instructor.show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        return view('instructor.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        $data = $request->validate([
            'name' => 'required|max:200',
            'lastname' => 'required|max:200',
            'education' => 'required|max:200',
            'rfc' => 'required|max:200',
            'sex' => 'required|max:100',
        ]);

        $instructor->update($data);

        return redirect()->route('instructors.index')->with('success', 'Tabla del Instructor actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();

        return redirect()->route('instructors.index')->with('success', 'tabla del instructor eliminado satisfactoriamente.');
    }
}