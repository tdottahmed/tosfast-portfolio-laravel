<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Edit Blog</h5>
                <x-action.link href="{{ route('blogs.index') }}" icon="ri-add-line">
                    {{ __('Blog List') }}</x-action.link>
            </div>
        </x-slot>
        <x-data-entry.form action="{{ route('blogs.update', $blog->id) }}" model="{{ $blog }})">
            <x-data-entry.input name="title" label="Title" type="text" required="true" :value="$blog->title" />
            <img src="{{ getFilePath($blog->image) }}" alt="banner" class="mb-30" style="max-width: 100%;">
            <x-data-entry.uploader-filepond name="image" label="Image" required="true" />
            <x-data-entry.editor name="description">{{ $blog->description }}</x-data-entry.editor>
            <x-data-entry.input name="author" label="Author" type="text" required="true" :value="$blog->author" />
            <x-data-entry.input name="designation" label="Designation" type="text" required="true"
                :value="$blog->designation" />
        </x-data-entry.form>
    </x-data-display.card>
</x-layouts.admin.master>