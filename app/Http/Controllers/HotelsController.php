<?php

namespace App\Http\Controllers;

use App\Models\Hotels;
use App\Models\Citys;
use App\Models\Countrys;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotels::all();

        return response()->json(['hotels' => $hotels], 200);
    }

    public function getHotels()
    {
        $citys = Citys::all();
        $countrys = Countrys::all();
        $hotels = Hotels::all();
        return view('hotel.hotel', [
            'hotels' => $hotels,
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
            'id_city' => 'required|exists:citys,id',
            'id_country' => 'required|exists:countrys,id',
        ]);

        $hotel = new Hotels();
        $hotel->name = $request->name;
        $hotel->id_city = $request->id_city;
        $hotel->id_country = $request->id_country;
        $hotel->save();

        return redirect('/hotels');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotels $hotels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotels $id)
    {
        $countrys = Countrys::all();
        $citys = Citys::all();
        return view('hotel.edit', ['hotel' => $id, 'countrys' => $countrys, 'citys' => $citys]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotels $id)
    {
        $request->validate([
            'name' => 'required',
            'id_city' => 'required|exists:citys,id',
            'id_country' => 'required|exists:countrys,id',
        ]);

        $id->name = $request->name;
        $id->id_city = $request->id_city;
        $id->id_country = $request->id_country;
        $id->save();

        return redirect('/hotels');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotels $id)
    {
        Hotels::find($id->id)->delete();
        return redirect('/hotels');
    }
}
