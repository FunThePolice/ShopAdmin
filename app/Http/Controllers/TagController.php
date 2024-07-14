<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagCreateRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{

    public function index(): View
    {
        $tags = Tag::all();
        return view('tag.index', compact('tags'));
    }

    public function create(): View
    {
        return view('tag.create');
    }

    public function edit(Tag $tag): View
    {
        return view('tag.edit', compact('tag'));
    }

    public function store(TagCreateRequest $request): RedirectResponse
    {
        Tag::create($request->validated());
        return redirect()->route('tag.index');
    }

    public function update(int $id, TagCreateRequest $request): RedirectResponse
    {
        Tag::find($id)->update($request->validated());
        return redirect()->route('tag.index');
    }

    public function delete(int $id): RedirectResponse
    {
        Tag::destroy($id);
        return redirect()->route('tag.index');
    }
}
