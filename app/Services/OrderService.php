<?php

namespace App\Services;

use App\Models\Product;

class OrderService
{
    public function processOrder($input)
    {
        $order = [
            "table_id" => $input["table"],
            "total_price" => 0,
            "print" => [
                "kasir" => null,
            ],
        ];

        $order_items = [];

        foreach($input["order"] as $index => $order_item) {
            $product = Product::with("category")->where("id", $order_item["product"])->first();

            $order_items[$index] = [
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => $order_item["quantity"],
            ];

            if(isset($order_item["variant"])) {
                $order_items[$index]["price"] = $product->variants[$order_item["variant"]]["price"];
            }

            $order_items[$index]["sub_total"] = $order_items[$index]["price"] * $order_items[$index]["quantity"];

            $order["total_price"] += $order_items[$index]["sub_total"];

            $order["print"]["kasir"][] = $order_items[$index];
            if(in_array($product->category->name, ["makanan", "promo"])) {
                $order["print"]["makanan"][] = $order_items[$index];
            }
            if(in_array($product->category->name, ["minuman", "promo"])) {
                $order["print"]["minuman"][] = $order_items[$index];
            }
        }

        $order["order_items"] = $order_items;

        return $order;
    }
}
