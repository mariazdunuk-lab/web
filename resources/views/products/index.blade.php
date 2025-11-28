@extends('layouts.layout')

@section('content')

<h1 class="text-3xl font-bold text-gray-800 mb-6">Каталог товарів</h1>

{{-- Форма фільтрів --}}
<form method="GET" action="{{ route('products.index') }}"
      class="bg-white p-6 rounded-xl shadow-md border border-gray-200 mb-8">

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        {{-- Пошук --}}
        <div>
            <label class="block text-gray-600 mb-1 font-medium">Пошук</label>
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Назва або опис..."
                   class="w-full p-2.5 border rounded-lg focus:ring-2 focus:ring-purple-400 outline-none">
        </div>

        {{-- Категорія --}}
        <div>
            <label class="block text-gray-600 mb-1 font-medium">Категорія</label>
            <select name="category"
                    class="w-full p-2.5 border rounded-lg focus:ring-2 focus:ring-purple-400 outline-none">
                <option value="">Всі категорії</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Мін ціна --}}
        <div>
            <label class="block text-gray-600 mb-1 font-medium">Ціна від</label>
            <input type="number" name="min" value="{{ request('min') }}"
                   class="w-full p-2.5 border rounded-lg focus:ring-2 focus:ring-purple-400 outline-none">
        </div>

        {{-- Макс ціна --}}
        <div>
            <label class="block text-gray-600 mb-1 font-medium">Ціна до</label>
            <input type="number" name="max" value="{{ request('max') }}"
                   class="w-full p-2.5 border rounded-lg focus:ring-2 focus:ring-purple-400 outline-none">
        </div>

    </div>

    <button
        class="mt-5 px-6 py-2 bg-purple-600 text-white rounded-lg shadow hover:bg-purple-700 transition">
        Застосувати
    </button>

</form>


{{-- Список товарів --}}
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

    @forelse($products as $product)

        <div class="bg-white p-4 rounded-xl shadow-md border border-gray-200 hover:shadow-lg hover:-translate-y-1 transition">

            {{-- Фото --}}
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}"
                     class="w-full h-48 object-cover rounded-lg mb-4 shadow-sm">
            @else
                <div class="w-full h-48 bg-purple-100 rounded-lg mb-4"></div>
            @endif

            {{-- Назва --}}
            <h2 class="text-xl font-semibold text-gray-800">
                {{ $product->name }}
            </h2>

            {{-- Ціна --}}
            <p class="text-lg text-purple-600 font-semibold mt-2">
                {{ number_format($product->price, 2) }} грн
            </p>

            {{-- Детальніше --}}
            <a href="{{ route('products.show', $product->id) }}"
               class="mt-4 inline-block px-4 py-2 border border-purple-500 text-purple-600 rounded-lg hover:bg-purple-50 transition">
                Детальніше
            </a>

            {{-- Адмінські кнопки --}}
            @if(auth()->check() && auth()->user()->role === 'admin')
                <div class="mt-5 flex gap-3">

                    {{-- Редагувати --}}
                    <a href="{{ route('products.edit', $product->id) }}"
                       class="px-3 py-1.5 bg-purple-500 hover:bg-purple-600 text-white rounded-md text-sm shadow transition">
                        Редагувати
                    </a>

                    {{-- Видалити --}}
                    <form action="{{ route('products.destroy', $product->id) }}"
                          method="POST"
                          onsubmit="return confirm('Видалити товар?')">
                        @csrf
                        @method('DELETE')
                        <button
                            class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-md text-sm shadow transition">
                            Видалити
                        </button>
                    </form>

                </div>
            @endif

        </div>

    @empty
        <p class="text-gray-600">Товарів не знайдено.</p>
    @endforelse

</div>

{{-- Пагінація --}}
<div class="mt-8">
    {{ $products->links() }}
</div>

@endsection
