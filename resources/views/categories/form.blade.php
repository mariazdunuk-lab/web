{{-- 
    Універсальна форма для створення та редагування категорії.
    Параметри:
      - $category (необов'язково)
--}}

<div class="mb-4">
    <label class="block mb-1 text-gray-700">Назва категорії</label>

    {{-- old() залишає введені дані у разі помилки --}}
    <input type="text" name="name"
           value="{{ old('name', $category->name ?? '') }}"
           class="w-full p-2 border rounded">
</div>
