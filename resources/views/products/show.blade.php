@extends('layouts.layout')

@section('content')

{{-- Заголовок сторінки товару --}}
<h1 class="text-3xl font-bold mb-6">{{ $product->name }}</h1>

<div class="soft-card max-w-3xl mx-auto">

    @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}"
             class="w-full max-h-96 object-cover rounded mb-6">
    @endif

    <h1 class="text-3xl font-bold text-purple-700 mb-4">{{ $product->name }}</h1>

    <p class="text-gray-600 mb-4">{{ $product->description }}</p>

    <p class="text-2xl text-purple-700 font-semibold mb-6">
        {{ $product->price }} грн
    </p>

    <a href="{{ route('products.index') }}" class="btn-outline-soft">Назад</a>

</div>


@endsection
