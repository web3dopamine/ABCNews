<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $categories = \DB::table('categories')->orderBy('id', 'desc')->get();

        return view('category.index', ['user' => $user, 'categories' => $categories]);
    }
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'category' => ['required'],
            ]);

            \DB::table('categories')->insert(['name' => $request->category]);
            $request->session()->flash('status', 'Category was added successfully!');
        }
        $user = Auth::user();

        return view('category.create', ['user' => $user]);
    }
    public function edit($id, Request $request)
    {
        $user = Auth::user();
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'category' => ['required'],
            ]);

            \DB::table('categories')->where('id', $id)->update(['name' => $request->category]);
            $request->session()->flash('status', 'Category was updated successfully!');
        }

        $category = \DB::table('categories')->where(['id' => $id])->first();

        return view('category.edit', ['user' => $user, 'category' => $category]);
    }

    public function delete($id)
    {
        \DB::table('categories')->where('id', $id)->delete();

        return ['success' => true];
    }
}
