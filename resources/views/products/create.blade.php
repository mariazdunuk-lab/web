@extends('layouts.layout')

@section('content')

<h1 class="text-3xl font-bold text-gray-800 mb-6">Новий товар</h1>

{{-- Обгортка форми --}}
<form method="POST"
      action="{{ route('products.store') }}"
      enctype="multipart/form-data"
      class="bg-white p-8 rounded-xl shadow-md border border-gray-200 max-w-2xl">

    @csrf

    {{-- Блок помилок --}}
    @if ($errors->any())
        <div class="mb-5 p-4 bg-red-100 text-red-700 rounded-lg border border-red-300">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Підключення полів форми --}}
    @include('products.form')

    {{-- Кнопка --}}
    <button class="mt-6 bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg shadow transition">
        Додати товар
    </button>

</form>

@endsection
