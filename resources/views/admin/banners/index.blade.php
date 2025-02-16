<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Banners</h5>
                <x-action.link href="{{ route('banners.create') }}"
                    icon="ri-add-line">{{ __('Create Banner') }}</x-action.link>
            </div>
        </x-slot>
        <x-data-display.data-table :rows="$banners" />
    </x-data-display.card>
</x-layouts.admin.master>
