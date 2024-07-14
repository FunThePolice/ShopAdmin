<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;



class ApiProductController extends Controller
{

    public function index(): JsonResponse
    {
        $productsResource = ProductResource::collection(Product::with('tags', 'images')->get());
        return response()->json($productsResource);
    }

}
