@extends('layouts.layout')

@section('content')

<h1 class="text-2xl font-bold mb-6">Адмін-панель</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold">Товарів</h2>
        <p class="text-3xl font-bold text-purple-600">{{ $stats['products'] }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold">Категорій</h2>
        <p class="text-3xl font-bold text-blue-600">{{ $stats['categories'] }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold">Користувачів</h2>
        <p class="text-3xl font-bold text-green-600">{{ $stats['users'] }}</p>
    </div>

</div>

@endsection
