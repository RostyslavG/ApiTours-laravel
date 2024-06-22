<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('tour')->get();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $order = new Order;
        // $order->status = $request->input('status');
        // $order->tour_id = $request->input('tourId');
        // $order->save();

        // return response()->json(['message' => 'Order placed successfully'], 201);

        $validatedData = $request->validate([
            'status' => 'required|string',
            'tour_id' => 'required|exists:tours,id'
        ]);

        $order = new Order;
        $order->status = $request->input('status');
        $order->tour_id = $request->input('tour_id');
        $order->save();

        return response()->json(['message' => 'Order placed successfully'], 201);
    }

    public function addWebStore(Request $request){
        Order::create($request->all());
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $id)
    {
       $order = Order::find($id->id);
       return view('order',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $id)
    {
        $id->update($request->all());
        return redirect('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $id)
    {
        $order = $id;
        $order->status = 'видалене';
        $order->save();
        $order->delete();
        return redirect('/orders');
    }

    public function restore($id)
    {
        $order = Order::withTrashed()->find($id);
          if ($order && $order->trashed()) {
            $order->status = 'активне'; 
            $order->save();
            $order->restore();
        }
        return redirect('/orders');
    }
    
    public function trashed()
    {
        $orders = Order::onlyTrashed()->with('tour')->get();
        return view('order.trashed', compact('orders'));
    }
}
