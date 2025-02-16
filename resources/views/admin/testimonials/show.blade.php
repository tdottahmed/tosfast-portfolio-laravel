<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Testimonial Details</h5>
                <x-action.link href="{{ route('testimonials.index') }}" icon="ri-arrow-left-s-line">Back</x-action.link>
            </div>
        </x-slot>

        <div class="row">
            <!-- Testimonial Image -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ getFilePath($testimonial->image) }}" class="card-img-top" alt="{{ $testimonial->title }}"
                        style="max-height: 300px; object-fit: cover;">
                </div>
            </div>

            <!-- Testimonial Title and Description -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $testimonial->title }}</h3>
                        <p class="card-text">{!! $testimonial->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </x-data-display.card>
</x-layouts.admin.master>
