<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Edit Team Member</h5>
                <x-action.link href="{{ route('teams.index') }}" icon="ri-add-line">
                    {{ __('Team List') }}</x-action.link>
            </div>
        </x-slot>
        <x-data-entry.form action="{{ route('teams.update', $team->id) }}" model="{{ $team }})">
            <x-data-entry.input name="name" label="Name" type="text" required="true" :value="$team->name" />
            <img src="{{ getFilePath($team->image) }}" alt="banner" class="mb-30" style="max-width: 100%;">
            <x-data-entry.uploader-filepond name="image" label="Image" required="true" />
            <x-data-entry.input name="designation" label="Designation" type="text" required="true"
                :value="$team->designation" />
            <x-data-entry.editor name="description">{{ $team->description }}</x-data-entry.editor>
        </x-data-entry.form>
    </x-data-display.card>
</x-layouts.admin.master>
