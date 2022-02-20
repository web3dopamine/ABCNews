<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $userCount = \DB::table('users')->count();

        $categoryCount = \DB::table('categories')->count();

        $articleCount = \DB::table('articles')->count();

        $randomArticle = \DB::table('articles')->join('users', 'users.id', 'articles.user_id')->orderByRaw("RAND()")->first();

        return view('dashboard', [
            'user' => $user,
            'userCount' => $userCount,
            'categoryCount' => $categoryCount,
            'articleCount' => $articleCount,
            'randomArticle' => $randomArticle,
        ]);
    }
}
