<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <h5 class="card-title">Edit Technology</h5>
        </x-slot>
        <x-data-entry.form action="{{ route('teams.update',$technology->id) }}" :model="true">
            <x-data-entry.input name="title" label="Title" type="text" value="{{ $technology->title }}" required="true" />
            <x-data-entry.uploader-filepond name="image" label="Image" required="true" />
            <x-data-entry.editor name="description">{{$technology->description}}</x-data-entry.editor>
        </x-data-entry.form>
    </x-data-display.card>
</x-layouts.admin.master>