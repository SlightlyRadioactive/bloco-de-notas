<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->orderBy('created_at', 'desc')->paginate(15);
        return view('categories.index', ['categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required|string|max:255'
        ]);

        $data['userId'] = 1;

        Category::create($data);

        return to_route('categories.index')->with('message','Categoria foi gravada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', ['category'=> $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category'=> $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name'=> 'required|string|max:255'
        ]);

        $category->update($data);

        return to_route('categories.index')->with('message','Categoria foi atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('categories.index')->with('message','Categoria removida com sucesso!');
    }
}