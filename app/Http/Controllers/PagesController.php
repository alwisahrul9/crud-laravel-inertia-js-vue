<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Article::where('title', 'LIKE', '%'. $request->search .'%')->latest()->get();
        } else {
            $data = Article::latest()->get();
        }
        $baseUrl = url('storage/image');
        return Inertia::render('Welcome', [
            'data' => $data,
            'url' => $baseUrl
        ]);
    }

    public function addData()
    {
        return Inertia::render('AddData');
    }
}
