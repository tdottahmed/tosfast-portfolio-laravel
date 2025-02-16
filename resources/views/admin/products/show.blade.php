<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Product Details</h5>
                <x-action.link href="{{ route('products.index') }}" icon="ri-arrow-left-s-line">Back</x-action.link>
            </div>
        </x-slot>

        <div class="row">
            <!-- Product Image -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ getFilePath($product->image) }}" class="card-img-top" alt="{{ $product->title }}"
                        style="max-height: 300px; object-fit: cover;">
                </div>
            </div>

            <!-- Product Title and Description -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->title }}</h3>
                        <p class="card-text">{!! $product->description !!}</p>
                    </div>
                </div>
            </div>
            <!-- Product Demo Link -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Demo Link</h3>
                        <p class="card-text">
                            <a href="{{ $product->demo_link }}" target="_blank">{{ $product->demo_link }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </x-data-display.card>
</x-layouts.admin.master>
