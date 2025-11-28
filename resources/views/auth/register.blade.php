@extends('layouts.layout')

@section('content')

<div class="auth-wrapper">

    <div class="auth-card">

        <h2>Реєстрація</h2>

        {{-- Глобальні помилки --}}
        @if ($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-700 text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label class="auth-label">Ім'я користувача</label>
            <input type="text" name="name" class="auth-input" value="{{ old('name') }}">

            <label class="auth-label">Електронна пошта</label>
            <input type="email" name="email" class="auth-input" value="{{ old('email') }}">

            <label class="auth-label">Пароль</label>
            <input type="password" name="password" class="auth-input">

            <label class="auth-label">Підтвердження пароля</label>
            <input type="password" name="password_confirmation" class="auth-input">

            <button class="btn-soft w-full text-center mt-4">Зареєструватися</button>
        </form>

        <p class="mt-4 text-center">
            Вже маєте акаунт?
            <a href="{{ route('login') }}" class="auth-link">Вхід</a>
        </p>

    </div>

</div>

@endsection
