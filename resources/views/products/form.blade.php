{{-- 
    Універсальна форма для створення та редагування товару.
    Параметри:
      - $product (необов’язковий)
      - $categories (список категорій)
--}}

{{-- Поле назви --}}
<div class="mb-4">
    <label class="block mb-1 text-gray-700">Назва</label>
    <input type="text" name="name"
           value="{{ old('name', $product->name ?? '') }}"
           class="w-full p-2 border rounded">
</div>

{{-- Поле опису --}}
<div class="mb-4">
    <label class="block mb-1 text-gray-700">Опис</label>
    <textarea name="description"
              class="w-full p-2 border rounded"
              rows="4">{{ old('description', $product->description ?? '') }}</textarea>
</div>

{{-- Поле ціни --}}
<div class="mb-4">
    <label class="block mb-1 text-gray-700">Ціна (грн)</label>
    <input type="number" step="0.01" name="price"
           value="{{ old('price', $product->price ?? '') }}"
           class="w-full p-2 border rounded">
</div>

{{-- Категорія --}}
<div class="mb-4">
    <label class="block mb-1 text-gray-700">Категорія</label>
    <select name="category_id" class="w-full p-2 border rounded">
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

{{-- Фото --}}
<div class="mb-4">
    <label class="block mb-1 text-gray-700">Зображення</label>
    <input type="file" name="image" class="w-full p-2 border rounded">

    {{-- Якщо є фото — показуємо прев’ю --}}
    @if(!empty($product->image))
        <img src="{{ asset('storage/'.$product->image) }}"
             class="w-32 h-32 object-cover rounded mt-3"
             alt="Product image">
    @endif
</div>
