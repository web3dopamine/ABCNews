<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $articles = \DB::table('articles')
                    ->select(['articles.id', 'articles.title', 'articles.details', 'users.name', 'articles.created_at', 'articles.updated_at', 'categories.name as category_name', 'image_path'])
                    ->join('users', 'users.id', 'articles.user_id')
                    ->join('categories', 'categories.id', 'articles.category_id')
                    ->orderBy('articles.id', 'desc')->get();

        return view('article.index', ['user' => $user, 'articles' => $articles]);
    }
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'title' => ['required'],
                'details' => ['required'],
                'image' => ['required', 'image'],
            ]);

            $imageFile = $request->file('image');
            $filename = time() . $imageFile->getClientOriginalName();

            \DB::table('articles')->insert([
                'title' => $request->title,
                'details' => $request->details,
                'user_id' => Auth::id(),
                'category_id' => $request->category,
                'image_path' => $filename,
            ]);
            $imageFile->move('article_images', $filename);
            $request->session()->flash('status', 'Article was added successfully!');
        }

        $user = Auth::user();

        $categories = \DB::table('categories')->get();

        return view('article.create', ['user' => $user, 'categories' => $categories]);
    }
    public function edit($id, Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'title' => ['required'],
                'details' => ['required'],
            ]);

            \DB::table('articles')->where('id', $id)->update([
                'title' => $request->title,
                'details' => $request->details,
                'category_id' => $request->category,
            ]);
            $request->session()->flash('status', 'Article was updated successfully!');
        }

        $user = Auth::user();
        $article = \DB::table('articles')->where('id', $id)->first();
        $categories = \DB::table('categories')->get();

        return view('article.edit', ['user' => $user, 'article' => $article, 'categories' => $categories]);
    }

    public function delete($id)
    {
        \DB::table('articles')->where('id', $id)->delete();

        return ['success' => true];
    }
}
