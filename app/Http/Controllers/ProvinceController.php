<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinces = Province::all();
        return view('provinces.index', compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provinces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Province::create($request->only('name'));
        return redirect()->route('provinces.index')->with('success', 'Provinsi berhasil ditambahkan.');
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
        return view('provinces.edit', compact('province'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Province $province)
    {
        $request->validate(['name' => 'required']);
        $province->update($request->only('name'));
        return redirect()->route('provinces.index')->with('success', 'Provinsi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Province $province)
    {
        $province->delete();
        return redirect()->route('provinces.index')->with('success', 'Provinsi berhasil dihapus.');
    }

    public function report()
    {
        $data = Province::with('regencies')->get();
        return view('reports.province', compact('data'));
    }
}
