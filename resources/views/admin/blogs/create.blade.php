<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Create Blog</h5>
                <x-action.link href="{{ route('blogs.index') }}" icon="ri-arrow-left-s-line">Back</x-action.link>
            </div>
        </x-slot>
        <x-data-entry.form action="{{ route('blogs.store') }}">
            <x-data-entry.input name="title" label="Title" type="text" required="true" />
            <x-data-entry.uploader-filepond name="image" label="Image" required="true" />
            <x-data-entry.editor name="description" />
            <x-data-entry.input name="author" label="Author" type="text" required="true" />
            <x-data-entry.input name="designation" label="Designation" type="text" required="true" />
        </x-data-entry.form>
    </x-data-display.card>
</x-layouts.admin.master>