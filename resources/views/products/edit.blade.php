@extends('layouts.layout')

@section('content')

<h1 class="text-2xl font-bold mb-6">Редагувати товар</h1>

<form method="POST"
      action="{{ route('products.update', $product->id) }}"
      enctype="multipart/form-data"
      class="bg-white p-6 rounded shadow">

    @csrf
    @method('PUT')

    @include('products.form', ['product' => $product])

    <button class="btn-soft mt-4">
        Оновити
    </button>
</form>

@endsection
