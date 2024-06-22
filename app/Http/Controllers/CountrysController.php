<?php

namespace App\Http\Controllers;

use App\Models\Countrys;
use Illuminate\Http\Request;

class CountrysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countrys = Countrys::all();
        return response()->json(['countrys' => $countrys], 200);
    }

    public function getCountrys()
    {
        $countrys = Countrys::all();
        return view('country.country', ['countrys' => $countrys]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $countrys = new Countrys();
        $countrys->name = $request->name;
        $countrys->save();

        return redirect('/countrys');
    }

    /**
     * Display the specified resource.
     */
    public function show(Countrys $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Countrys $id)
    {
        return view('country.edit', ['countrys' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Countrys $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $id->name = $request->name;
        $id->save();

        return redirect('/countrys');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Countrys $id)
    {
        Countrys::find($id->id)->delete();
        return redirect('/countrys');
    }
}
