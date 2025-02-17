<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <h5 class="card-title">Create Technology</h5>
        </x-slot>
        <x-data-entry.form action="{{ route('technologies.store') }}">
            <x-data-entry.input name="title" label="Title" type="text" required="true" />
            <x-data-entry.uploader-filepond name="image" label="Image" required="true" />
            <x-data-entry.editor name="description" />
        </x-data-entry.form>
    </x-data-display.card>
</x-layouts.admin.master>
