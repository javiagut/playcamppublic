@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="lg:w-2/3 lg:mx-auto flex items-center justify-around">
            <div class="flex justify-around items-center flex-1">
                <span>
                    @if ($paginator->onFirstPage())
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium cursor-default leading-5 rounded-md">
                            <span class="material-symbols-outlined text-red-400">chevron_left</span>
                        </span>
                    @else
                        <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 rounded-md hover:text-gray-500 transition ease-in-out duration-150">
                            <span class="material-symbols-outlined text-red-400">chevron_left</span>
                        </button>
                    @endif
                </span>
                <div class="sm:flex-1 sm:flex sm:items-center sm:justify-around">
                    <div>
                        <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">
                            <span>{!! __('Viendo') !!}</span>
                            <span class="font-medium">{{ $paginator->firstItem() }}</span>
                            <span>{!! __('-') !!}</span>
                            <span class="font-medium">{{ $paginator->lastItem() }}</span>
                            <span>{!! __('de') !!}</span>
                            <span class="font-medium">{{ $paginator->total() }}</span>
                            <span>{!! __('campings') !!}</span>
                        </p>
                    </div>
                </div>

                <span>
                    @if ($paginator->hasMorePages())
                        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium leading-5 rounded-md hover:text-gray-500 transition ease-in-out duration-150">
                            <span class="material-symbols-outlined text-red-400">chevron_right</span>
                        </button>
                    @else
                        <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium  cursor-default leading-5 rounded-md">
                            <span class="material-symbols-outlined text-gray-400">chevron_right</span>
                        </span>
                    @endif
                </span>
            </div>

        </nav>
    @endif
</div>
