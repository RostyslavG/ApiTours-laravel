<?php

namespace App\Http\Controllers;

use App\Models\Tours;
use App\Models\Hotels;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tours::all();

        return response()->json(['tours' => $tours], 200);
    }

    public function getTours()
    {
        $tours = tours::all();
        $hotels = hotels::all();
        return view('tour.tour', ['tours' => $tours, 'hotels' => $hotels]);
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
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_hotel' => 'required|exists:hotels,id',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tour_images', 'public');
        }

        $tour = new Tours();
        $tour->name = $request->name;
        $tour->description = $request->description;
        $tour->price = $request->price;
        $tour->image = $imagePath;
        $tour->id_hotel = $request->id_hotel;
        $tour->save();

        return redirect('/tours');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tours $tours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tours $id)
    {
        $hotels = hotels::all();
        return view('tour.edit', ['tours' => $id, 'hotels' => $hotels]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tours $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'id_hotel' => 'required|exists:hotels,id',
        ]);

        $id->name = $request->name;
        $id->description = $request->description;
        $id->price = $request->price;
        $id->image = $request->image;
        $id->id_hotel = $request->id_hotel;
        $id->save();

        return redirect('/tours');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tours $id)
    {
        Tours::find($id->id)->delete();
        return redirect('/tours');
    }
}
