<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Services</h5>
                <x-action.link href="{{ route('services.create') }}"
                    icon="ri-add-line">{{ __('Create Service') }}</x-action.link>
            </div>
        </x-slot>
        <x-data-display.data-table :rows="$services" :ignoreColumns="['description']" />
    </x-data-display.card>
</x-layouts.admin.master>
