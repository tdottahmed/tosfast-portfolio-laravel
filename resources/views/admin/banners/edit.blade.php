<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Edit Banner</h5>
                <x-action.link href="{{ route('banners.index') }}" icon="ri-arrow-left-s-line">Back</x-action.link>
            </div>
        </x-slot>
        <x-data-entry.form :action="route('banners.update', $banner->id)" :model="true">
            <x-data-entry.input name="title" label="Title" type="text" required="true" :value="$banner->title" />
            <img src="{{ getFilePath($banner->image) }}" alt="banner" class="mb-30" style="max-width: 100%;">
            <x-data-entry.uploader-filepond name="image" label="Image" required="true" />
            <x-data-entry.text-area name="description" label="Description" type="textarea" required="true"
                :value="$banner->description" />
            <x-data-entry.input name="link" label="Link" type="text" required="true" :value="$banner->link" />
        </x-data-entry.form>
    </x-data-display.card>
</x-layouts.admin.master>
