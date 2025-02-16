<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Team Details</h5>
                <x-action.link href="{{ route('teams.index') }}" icon="ri-arrow-left-s-line">Back</x-action.link>
            </div>
        </x-slot>

        <div class="row">
            <!-- Team Image -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ getFilePath($team->image) }}" class="card-img-top" alt="{{ $team->name }}"
                        style="max-height: 300px; object-fit: cover;">
                </div>
            </div>

            <!-- Team Name and Description -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $team->name }}</h3>
                        <p class="card-text">{!! $team->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </x-data-display.card>
</x-layouts.admin.master>
