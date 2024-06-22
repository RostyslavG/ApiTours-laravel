<?php

namespace App\Http\Controllers;

use App\Models\Citys;
use App\Models\Countrys;
use App\Models\Hotels;
use Illuminate\Http\Request;

class CitysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $citys = Citys::all();
       return response()->json(['citys' => $citys], 200);
    }

    public function getCitys()
    {
        $citys = Citys::all();
        $countrys = Countrys::all();

        return view('/sity.sity', [
            'citys' => $citys,
            'countrys' => $countrys
        ]);
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
            'name' => 'required',
            'id_country' => 'required|exists:countrys,id',
        ]);

        $city = new Citys();
        $city->name = $request->name;
        $city->id_country = $request->id_country;
        $city->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Citys $citys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Citys $id)
    {
       $countrys = Countrys::all();
       return view('sity.edit', ['city' => $id, 'countrys' => $countrys]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Citys $id)
    {
        $request->validate([
            'name' => 'required',
            'id_country' => 'required|exists:countrys,id',
        ]);

        $id->name = $request->name;
        $id->id_country = $request->id_country;
        $id->save();

        return redirect('/citys');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Citys $id)
    {
        Citys::find($id->id)->delete();
        return redirect('/citys');
    }
}
