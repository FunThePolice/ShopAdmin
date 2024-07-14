<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index(): View
    {
        $items = [];
        return view('profile', compact('items'));
    }

    public function showByTag(Request $request): View
    {
        $items = [];
        if ($request->input('tag')) {
            $tag = Tag::with('products', 'shops')->where('name', $request->input('tag'))->get()->first();
            $items = collect($tag->getRelations())->flatten();
        }

        return view('profile', compact('items'));
    }

    public function show(string $modelKey): View
    {
        $items = [];
        if ($modelKey) {
            $model = '\\App\Models\\' . $modelKey;
            $items = $model::all();
        }

        return view('profile', compact('items'));
    }

}
