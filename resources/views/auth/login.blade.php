@extends('layouts.layout')

@section('content')

<div class="auth-wrapper">

    <div class="auth-card">

        <h2>Вхід</h2>

        @if ($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-700 text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label class="auth-label">Електронна пошта</label>
            <input type="email" name="email" class="auth-input" value="{{ old('email') }}">

            <label class="auth-label">Пароль</label>
            <input type="password" name="password" class="auth-input">

            <button class="btn-soft w-full text-center mt-4">Увійти</button>
        </form>

        <p class="mt-4 text-center">
            Немає акаунта?
            <a href="{{ route('register') }}" class="auth-link">Реєстрація</a>
        </p>

    </div>

</div>

@endsection
