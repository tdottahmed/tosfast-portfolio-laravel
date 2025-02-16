<x-layouts.admin.master>
    <x-data-display.card>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Blog Details</h5>
                <x-action.link href="{{ route('blogs.index') }}" icon="ri-arrow-left-s-line">Back</x-action.link>
            </div>
        </x-slot>

        <div class="row">
            <!-- Blog Image -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ getFilePath($blog->image) }}" class="card-img-top" alt="{{ $blog->title }}"
                        style="max-height: 300px; object-fit: cover;">
                </div>
            </div>

            <!-- Blog Title and Description -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $blog->title }}</h3>
                        <p class="card-text">{!! $blog->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </x-data-display.card>
</x-layouts.admin.master>
