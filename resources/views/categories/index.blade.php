@extends('layouts.layout')

@section('content')

<h1 class="text-3xl font-bold text-gray-800 mb-6">Категорії</h1>

{{-- Кнопка додавання --}}
<a href="{{ route('categories.create') }}"
   class="inline-block mb-5 px-6 py-2 bg-purple-600 text-white rounded-lg shadow hover:bg-purple-700 transition">
    + Нова категорія
</a>

{{-- Таблиця категорій --}}
<div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">

    <table class="w-full border-collapse">
        <thead>
        <tr class="bg-gray-100 text-left text-gray-700">
            <th class="p-3 border-b">ID</th>
            <th class="p-3 border-b">Назва</th>
            <th class="p-3 border-b text-center w-40">Дії</th>
        </tr>
        </thead>

        <tbody>
        @forelse($categories as $category)
            <tr class="hover:bg-gray-50 transition">
                <td class="p-3 border-b">{{ $category->id }}</td>
                <td class="p-3 border-b font-medium text-gray-800">{{ $category->name }}</td>

                <td class="p-3 border-b text-center">

                    <a href="{{ route('categories.edit', $category->id) }}"
                       class="inline-block px-3 py-1.5 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 transition">
                        Редагувати
                    </a>

                    <form action="{{ route('categories.destroy', $category->id) }}"
                          method="POST"
                          class="inline-block"
                          onsubmit="return confirm('Видалити категорію?')">

                        @csrf
                        @method('DELETE')

                        <button
                            class="inline-block px-3 py-1.5 bg-red-600 text-white rounded-md shadow hover:bg-red-700 transition">
                            Видалити
                        </button>
                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="p-4 text-center text-gray-500">
                    Категорій поки немає.
                </td>
            </tr>
        @endforelse
        </tbody>

    </table>
</div>

@endsection
