@props(['id' => null, 'maxWidth' => null, 'flex' => isset($flex) ? $flex : null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg font-medium text-gray-900">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm text-gray-600">
            {{ $content }}
        </div>
    </div>

    <div class="{{isset($flex) ? $flex : 'flex justify-end'}} flex-row px-6 py-4 bg-gray-100 text-end">
        {{ $footer }}
    </div>
</x-modal>
