<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Edit Product</h5>
                <x-action.link href="{{ route('products.index') }}" icon="ri-add-line">
                    {{ __('Product List') }}</x-action.link>
            </div>
        </x-slot>
        <x-data-entry.form action="{{ route('products.update', $product->id) }}" model="{{ $product }})">
            <x-data-entry.input name="title" label="Title" type="text" required="true" :value="$product->title" />
            <img src="{{ getFilePath($product->image) }}" alt="banner" class="mb-30" style="max-width: 100%;">
            <x-data-entry.uploader-filepond name="image" label="Image" required="true" />
            <x-data-entry.editor name="description">{{ $product->description }}</x-data-entry.editor>
            <x-data-entry.input name="demo_link" label="Demo Link" :value="$product->demo_link" />
        </x-data-entry.form>
    </x-data-display.card>
</x-layouts.admin.master>
