<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Collection;


class OrderService
{

    public static function createOrder(array $products): Order
    {

        $collection = Collection::make($products);
        $amount = $collection->countBy('sku');
        $models = Product::whereIn('sku', $amount->keys())->get();

        foreach ($amount as $sku => $value) {
            $product = $models->where('sku', $sku)->first();
            $deltaAmount = $product->amount - $value;

            if ($deltaAmount < 0) {
                continue;
            }

            $dataForUpdate[] = [
                'sku' => $product->sku,
                'amount' => $deltaAmount
            ];

        }

        Product::upsert($dataForUpdate, ['sku'], ['amount']);

        return Order::create([
            'number' => Carbon::now()->format('ymdHis'),
            'body' => json_encode($products),
            'total_price' => $collection->sum('price'),
        ]);
    }
}
