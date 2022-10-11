@if ($paginator->hasPages())
<div class="flex flex-row items-center space-x-2 py-8">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="flex items-center px-2 py-2 text-gray-500 border border-gray-400 rounded-md" aria-label="@lang('pagination.previous')" aria-disabled="true">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-6 h-6"><path fill="currentColor" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" class=""></path></svg>
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="flex items-center px-2 py-2 text-gray-500 border border-gray-400 rounded-md" aria-label="@lang('pagination.previous')">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="text-gray-800 w-6 h-6"><path fill="currentColor" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" class=""></path></svg>
        </a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)

        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span aria-current="page" class="flex items-center px-4 py-2 text-gray-500 border border-green-400 rounded-md">
                        {{$page}}
                    </span>
                @else
                    <a href="{{ $url }}" class="flex items-center px-4 py-2 text-gray-500 border border-gray-400 rounded-md">
                        {{$page}}
                    </a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="flex items-center px-2 py-2 text-gray-500 border border-gray-400 rounded-md" aria-label="@lang('pagination.next')">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-6 h-6 text-gray-800"><path fill="currentColor" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" class=""></path></svg>
        </a>
    @else
        <span class="flex items-center px-2 py-2 text-gray-500 border border-gray-400 rounded-md" aria-label="@lang('pagination.next')" aria-disabled="true">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-6 h-6"><path fill="currentColor" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" class=""></path></svg>
        </span>
    @endif
</div>
@endif
