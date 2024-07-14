<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\Tag;
use App\Services\FileService;
use App\Services\OrderService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProductController extends Controller
{

    public function index(): View
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create(): View
    {
        $tags = Tag::all();
        return view('product.create', compact('tags'));
    }

    public function edit(Product $product): View
    {
        $tags = Tag::all();
        return view('product.edit', compact('product','tags'));
    }

    /**
     * @throws ValidationException
     */
    public function store(ProductCreateRequest $request): RedirectResponse
    {
        $product = Product::create($request->except('images','tags'));

        if ($request->hasFile('images')) {
            FileService::storeRelatedImage($request->file('images'), $product);
        }

        if ($request->input('tags')) {
            $product->tags()->attach(Tag::whereIn('id', $request->input('tags'))->get());
        }

        return redirect()->route('product.index');
    }

    public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->except(['images','tags']));

        if ($request->input('tags')) {
        $product->tags()->sync($request->input('tags'));
        } else {
            $product->tags()->detach();
        }

        if ($request->file('images')) {
            FileService::updateRelatedImage($request->file('images'), $product);
        }

        return redirect()->route('product.index');
    }

    public function delete(Product $product): RedirectResponse
    {
        FileService::deleteRelatedImages($product);
        $product->tags()->detach();
        $product->delete();

        return redirect()->route('index');
    }

}
