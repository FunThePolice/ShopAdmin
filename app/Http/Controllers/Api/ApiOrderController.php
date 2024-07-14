<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class ApiOrderController extends Controller
{

    public function index()
    {
        $ordersResource = OrderResource::collection(Order::all());
        return response()->json($ordersResource);
    }

    public function create(Request $request)
    {
        $order = OrderService::createOrder($request->input('params'));

        return response()->json(OrderResource::make($order));
    }
}
