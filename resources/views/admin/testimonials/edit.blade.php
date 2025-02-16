<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Edit Testimonial</h5>
                <x-action.link href="{{ route('testimonials.index') }}" icon="ri-add-line">
                    {{ __('Testimonial List') }}</x-action.link>
            </div>
        </x-slot>
        <x-data-entry.form action="{{ route('testimonials.update', $testimonial->id) }}" model="{{ $testimonial }})">
            <x-data-entry.input name="title" label="Title" type="text" required="true" :value="$testimonial->title" />
            <img src="{{ getFilePath($testimonial->image) }}" alt="banner" class="mb-30" style="max-width: 100%;">
            <x-data-entry.uploader-filepond name="image" label="Image" required="true" />
            <x-data-entry.editor name="description">{{ $testimonial->description }}</x-data-entry.editor>
            <x-data-entry.input name="author" label="Author" type="text" required="true" :value="$testimonial->author" />
            <x-data-entry.input name="designation" label="Designation" type="text" required="true"
                :value="$testimonial->designation" />
        </x-data-entry.form>
    </x-data-display.card>
</x-layouts.admin.master>