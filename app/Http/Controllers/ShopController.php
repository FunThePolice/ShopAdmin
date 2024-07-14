<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopCreateRequest;
use App\Http\Requests\ShopUpdateRequest;
use App\Models\Shop;
use App\Models\Tag;
use App\Services\FileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ShopController extends Controller
{

    public function index(): View
    {
        $shops = Shop::all();
        return view('shop.index', compact('shops'));
    }

    public function create(): View
    {
        $tags = Tag::all();
        return view('shop.create', compact('tags'));
    }

    public function edit(Shop $shop): View
    {
        $tags = Tag::all();
        return view('shop.edit', compact('shop', 'tags'));
    }

    public function store(ShopCreateRequest $request): RedirectResponse
    {
        $shop = Shop::create($request->except('images','tags'));

        if ($request->hasFile('images')) {
            FileService::storeRelatedImage($request->file('images'), $shop);
        }

        if ($request->input('tags')) {
            $shop->tags()->attach(Tag::whereIn('id', $request->input('tags'))->get());
        }

        return redirect()->route('shop.index');
    }

    public function update(ShopUpdateRequest $request, Shop $shop): RedirectResponse
    {
        $shop->update($request->except(['images','tags']));

        if ($request->input('tags')) {
            $shop->tags()->sync($request->input('tags'));
        }

        if ($request->file('images')) {
            FileService::updateRelatedImage($request->file('images'), $shop);
        }

        return redirect()->route('shop.index');
    }

    public function delete(Shop $shop): RedirectResponse
    {
        FileService::deleteRelatedImages($shop);
        $shop->tags()->detach();
        $shop->delete();

        return redirect()->route('shop.index');
    }

}
