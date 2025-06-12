{{-- filepath: resources/views/vendor/pagination/custom-tailwind.blade.php --}}
@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center mt-4">
        <ul class="inline-flex items-center -space-x-px">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-3 py-2 ml-0 leading-tight text-gray-400 bg-white border border-gray-300 rounded-l-lg cursor-not-allowed">
                        &laquo; Prev
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        class="px-3 py-2 ml-0 leading-tight text-gray-700 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 transition">
                        &laquo; Prev
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span class="px-3 py-2 leading-tight text-gray-400 bg-white border border-gray-300">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-3 py-2 leading-tight text-white bg-blue-600 border border-blue-600 font-bold rounded transition">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                    class="px-3 py-2 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-blue-700 transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        class="px-3 py-2 leading-tight text-gray-700 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-blue-700 transition">
                        Next &raquo;
                    </a>
                </li>
            @else
                <li>
                    <span class="px-3 py-2 leading-tight text-gray-400 bg-white border border-gray-300 rounded-r-lg cursor-not-allowed">
                        Next &raquo;
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif