<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search) 
        {
            // $news = DB::table('news')
            //     ->where('title', 'like', "&$search&")
            //     ->paginate(6);
            // Olequent orm search
            $news = News::where('title', 'like', "%$search%")->paginate(3);
        } else {
            // $news = DB::table('news')->paginate(6);
            // Olequent orm paginate
            $news = News::paginate(3);
        }
        
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

        // DB::table('news')->insert([
        //     'title' => $request->title,
        //     'body' => $request->body,
        // ]);

        // insert orm
        // Cara pertama
        // $news = new News;
        // $news->title = $request->title;
        // $news->body = $request->body;
        // $news->save();

        $imagePath = $request->file('image')->store('images');

        // Cara kedua
        News::create([
            'title' => $request->title,
            'body' => $request->body,
            'image_path' => $imagePath,
        ]);

        return redirect('/news');
    }

    public function show($id)
    {
        // $news = DB::table('news')->where('id', $id)->first();
        // Olequent ORM show
        $news = News::find($id);

        return view('news.show', ['news' => $news]);
    }

    public function edit($id)
    {
        // $news = DB::table('news')->where('id', $id)->first();
        // Olequent ORM edit
        $news = News::find($id);

        return view('news.edit', ['news' => $news]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        // $affected = DB::table('news')
        //     ->where('id', $request->id)
        //     ->update(
        //         [
        //         'title' => $request->title,
        //         'body' => $request->body
        //         ]
        //     );

        // Upload image
        $imagePath = $request->file('image')->store('images');

        // Olequent ORM update
        $news = News::find($request->id);
        $news->title = $request->title;
        $news->body = $request->body;
        $news->image_path = $imagePath;
        $news->save();

        return redirect('/news/' . $request->id);
    }

    public function destroy($id)
    {
        // $deleted = DB::table('news')->where('id', $id)->delete();

        // Olequent ORM delete
        News::find($id)->delete();

        return redirect('/news');
    }
}
