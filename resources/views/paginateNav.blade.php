@if ($paginator->hasPages())
    <nav class="flex justify-center mt-6">
        <ul class="inline-flex space-x-1">

            {{-- Попередня сторінка --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-1 bg-gray-300 text-gray-500 rounded">Назад</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">
                        Назад
                    </a>
                </li>
            @endif


            {{-- Номери сторінок --}}
            @foreach ($elements as $element)
                {{-- Три крапки --}}
                @if (is_string($element))
                    <li class="px-3 py-1">{{ $element }}</li>
                @endif

                {{-- Масив посилань --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-3 py-1 bg-blue-600 text-white rounded">
                                {{ $page }}
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach


            {{-- Наступна сторінка --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">
                        Вперед
                    </a>
                </li>
            @else
                <li class="px-3 py-1 bg-gray-300 text-gray-500 rounded">Вперед</li>
            @endif

        </ul>
    </nav>
@endif
