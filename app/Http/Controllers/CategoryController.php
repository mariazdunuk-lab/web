<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Список категорій
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Форма створення
    public function create()
    {
        return view('categories.create');
    }

    // Збереження категорії
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|unique:categories,name',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Category created');
    }

    // Форма редагування
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Оновлення категорії
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|unique:categories,name,' . $category->id,
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Category updated');
    }

    // Видалення
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted');
    }
}
