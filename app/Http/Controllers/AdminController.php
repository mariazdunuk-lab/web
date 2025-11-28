<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // Мінімальна статистика (можеш використовувати або прибрати)
        $stats = [
            'products' => Product::count(),
            'categories' => Category::count(),
            'users' => User::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
