<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\OrderService;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::all();

        return response()->json($order);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, OrderService $service)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "table" => ["required", "exists:tables,id"],
                "order.*.product" => ["required", "exists:products,id"],
                "order.*.variant" => ["nullable"],
                "order.*.quantity" => ["required", "integer", "min:1"],
            ],
        );

        if($validator->fails()) {
            return $validator->errors();
        }

        $order = $service->processOrder($validator->validated());

        Order::create($order);

        return response()->json($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return response()->json($order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }
}
