<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|max:512|mimes:png,jpg,jpeg',
            'content' => 'required',
        ]);

        if($request->hasFile('image')){
            $request->file('image')->store('image', 'public');

            Article::create([
                'title' => $request->title,
                'image' => $request->image->hashName(),
                'content' => $request->content
            ]);

        } else {
            Article::create([
                'title' => $request->title,
                'content' => $request->content
            ]);
        }

        return to_route('welcome')->with('message', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $find = Article::find($id);
        $baseUrl = url('storage/image');
        return Inertia::render('Show', [
            'data' => $find,
            'url' => $baseUrl
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $find = Article::find($id);

        return Inertia::render('EditData', [
            'data' => $find
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $find = Article::find($id);

        $request->validate([
            'title' => 'required',
            'image' => 'nullable|max:512|mimes:png,jpg,jpeg',
            'content' => 'required',
        ]);

        if($request->hasFile('image')){

            Storage::delete('public/image/'. basename($find->image));

            $request->file('image')->store('image', 'public');

            $find->update([
                'title' => $request->title,
                'image' => $request->image->hashName(),
                'content' => $request->content
            ]);

        } else {
            $find->update([
                'title' => $request->title,
                'content' => $request->content
            ]);
        }

        return to_route('welcome')->with('message', 'Data update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $find = Article::find($id);

        Storage::delete('public/image/'. basename($find->image));

        $find->delete();

        return to_route('welcome')->with('message', 'Data removed successfully');
    }
}
