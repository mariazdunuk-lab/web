@extends('layouts.layout')

@section('content')

<h1 class="text-2xl font-bold mb-6">Додати категорію</h1>

<form action="{{ route('categories.store') }}" method="POST"
      class="bg-white p-6 rounded shadow max-w-lg">

    @csrf

    @include('categories.form')

    <button class="mt-4 px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">
        Додати
    </button>

</form>

@endsection
