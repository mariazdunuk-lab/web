@extends('layouts.layout')

@section('content')

<h1 class="text-2xl font-bold mb-6">Редагувати категорію</h1>

<form action="{{ route('categories.update', $category->id) }}"
      method="POST"
      class="bg-white p-6 rounded shadow max-w-lg">

    @csrf
    @method('PUT')

    @include('categories.form', ['category' => $category])

    <button class="mt-4 px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Оновити
    </button>

</form>

@endsection
