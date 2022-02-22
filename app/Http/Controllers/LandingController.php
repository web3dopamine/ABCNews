<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $categories = \DB::table('categories')->orderBy('id', 'desc')->get();

        $userCount = \DB::table('users')->count();

        $categoryCount = \DB::table('categories')->count();

        $articleCount = \DB::table('articles')->count();

        $randomArticle = \DB::table('articles')->join('users', 'users.id', 'articles.user_id')->orderByRaw("RAND()")->first();

        if ($request->id) {
            $articles = \DB::table('articles')->where('category_id', $request->id)->orderBy('id', 'DESC')->get();
        } else {
            $articles = \DB::table('articles')->orderBy('id', 'DESC')->get();
        }

        return view('landing', [
            'userCount' => $userCount,
            'categoryCount' => $categoryCount,
            'articleCount' => $articleCount,
            'articles' => $articles,
            'categories' => $categories,
            'randomArticle' => $randomArticle,
        ]);
    }
}
