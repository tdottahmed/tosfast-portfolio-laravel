<x-layouts.admin.master>
    <div class="row">
        @foreach ($visitors as $visitor)
            <div class="col-lg-4 col-2">
                <x-data-display.card>
                    <x-slot name="header">
                        <i class="ri-eye-line"></i> Visitor
                    </x-slot>
                    <ul class="list-group">
                        <li class="list-group-item disabled" aria-disabled="true">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="https://flagcdn.com/w320/{{ strtolower($visitor->iso_code) }}.png"
                                        alt="{{ $visitor->iso_code }}" class="avatar-xs rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    {{ $visitor->country }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <strong>City:</strong>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    {{ $visitor->city }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <strong>Total Visits:</strong>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    <span class="badge bg-primary">{{ $visitor->visits }}</span>
                                </div>

                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <strong>Ip Address:</strong>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    {{ $visitor->ip_address }}
                                </div>

                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <strong>Last Visit:</strong>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    {{ formatTimestamp($visitor->updated_at, 'l, d F Y') }}
                                </div>

                            </div>
                        </li>
                    </ul>
                </x-data-display.card>
            </div>
        @endforeach
    </div>
</x-layouts.admin.master>
