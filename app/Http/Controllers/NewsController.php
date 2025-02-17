<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = DB::table('news')->get();
 
        return view('news.index', ['news' => $news]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        DB::table('news')->insert([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect('/news');
    }

    public function show($id)
    {
        $news = DB::table('news')->where('id', $id)->first();

        return view('news.show', ['news' => $news]);
    }
}
