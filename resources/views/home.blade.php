@extends('layouts.layout')

@section('content')

<div class="soft-card text-center max-w-3xl mx-auto mt-10">

    <h1 class="text-4xl font-bold mb-4 text-purple-700">Вітаємо в SoftShop</h1>

    <p class="text-gray-600 mb-6">
        Ніжний онлайн-каталог товарів. Переглядайте, фільтруйте та відкривайте нові речі, які вам сподобаються 💜
    </p>

    <a href="{{ route('products.index') }}" class="btn-soft">
        Перейти до каталогу
    </a>

</div>

@endsection
