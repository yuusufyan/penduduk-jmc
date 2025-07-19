<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;

class RegencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $provinces = Province::all();
        $regencies = Regency::with('province');

        if ($request->province_id) {
            $regencies->where('province_id', $request->province_id);
        }

        $regencies = $regencies->get();

        return view('regencies.index', compact('regencies', 'provinces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $provinces = Province::all();
        return view('regencies.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'province_id' => 'required|exists:provinces,id',
            'name' => 'required',
            'population' => 'required|integer|min:0',
        ]);

        Regency::create($request->only('province_id', 'name', 'population'));
        return redirect()->route('regencies.index')->with('success', 'Kabupaten berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $provinces = Province::all();
        return view('regencies.edit', compact('regency', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Regency $regency)
    {
        //
        $request->validate([
            'province_id' => 'required|exists:provinces,id',
            'name' => 'required',
            'population' => 'required|integer|min:0',
        ]);

        $regency->update($request->only('province_id', 'name', 'population'));
        return redirect()->route('regencies.index')->with('success', 'Kabupaten berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regency $regency)
    {
        //
        $regency->delete();
        return redirect()->route('regencies.index')->with('success', 'Kabupaten berhasil dihapus.');
    }

    public function report(Request $request)
    {
        $query = Regency::with('province');

        if ($request->province_id) {
            $query->where('province_id', $request->province_id);
        }

        $data = $query->get();
        $provinces = Province::all();

        return view('reports.regency', compact('data', 'provinces'));
    }
}
