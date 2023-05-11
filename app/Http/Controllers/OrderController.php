<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
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
        //
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)
            ->where('status', 'open')
            ->first();

        if($order == null) {
            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'open'
            ]);
        }

        $row = $order->products()->where('products.id', $request->product_id)->first();

        if($row != null) {
            $row->pivot->quantity = $row->pivot->quantity + $request->quantity;
            $row->pivot->save();
        } else {
            $order->products()->save(Product::find($request->product_id), ['quantity' => $request->quantity]);
        }
        return redirect()->route('products.show', ['product' => $request->product_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('status', 'open')->first();
        $total = 0;

        if($order) {
            foreach($order->products as $product) {
                $total = $total + $product->price  * $product->pivot->quantity;
            }
        }

        return view('order.show', compact('order', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order.show');
    }

    public function order(Order $order)
    {
        $order->status = 'closed';
        $order->save();

        $total = 0;
        
        foreach($order->products as $product) {
            $total = $total + $product->price  * $product->pivot->quantity;
        }

        return view('order.invoice', compact('order', 'total'));
    }
}