<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\OrderService;
use App\Http\Resources\OrderResource;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrderResource::collection(Order::with(["table"])->get());
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

        $created = Order::create($order);

        return response()->json([
            "order" => [
                "table" => $created->table->name,
                "total_price" => $created->total_price,
                "datetime" => Carbon::parse($created->created_at)->format("Y-m-d H:i"),
            ],
            "print" => $order["print"]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {

        if($order->id == null) {
            return response()->json([
                "message" => "Order not found"
            ], 404);
        }

        $response = [
            "table" => $order->table->name,
            "total_price" => $order->total_price,
            "datetime" => Carbon::parse($order->created_at)->format("Y-m-d H:i"),
            "order_items" => $order->order_items,
        ];

        return response()->json($response);
    }
}
