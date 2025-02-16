<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Blogs</h5>
                <x-action.link href="{{ route('blogs.create') }}"
                    icon="ri-add-line">{{ __('Create Blog') }}</x-action.link>
            </div>
        </x-slot>
        <x-data-display.data-table :rows="$blogs" :ignoreColumns="['description']" />
    </x-data-display.card>
</x-layouts.admin.master>