@props([
    'appendedColumns' => [],
    'ignoreColumns' => [], // New prop for ignoring columns
])

<table id="scroll-horizontal" class="table nowrap align-middle dt-responsive" style="width:100%">
    <thead>
        <tr>
            <th scope="col" style="width: 10px;">
                <div class="form-check">
                    <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                </div>
            </th>
            <th>{{ __('SL No') }}</th>
            @foreach ($appendedColumns as $column)
                @if (!in_array($column, $ignoreColumns))
                    <th>{{ ucwords(str_replace('_', ' ', $column)) }}</th>
                @endif
            @endforeach
            @foreach ($columns as $column)
                @if (!in_array($column, $ignoreColumns))
                    <th>{{ ucwords(str_replace('_', ' ', $column)) }}</th>
                @endif
            @endforeach
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($rows as $row)
            <tr>
                <th scope="row">
                    <div class="form-check">
                        <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                    </div>
                </th>
                <td>{{ $loop->iteration }}</td>
                @foreach ($appendedColumns as $column)
                    @if (!in_array($column, $ignoreColumns))
                        <td>{{ $row->$column }}</td>
                    @endif
                @endforeach
                @foreach ($columns as $column)
                    @if (!in_array($column, $ignoreColumns))
                        <td>
                            @if (in_array($column, ['created_at', 'updated_at']))
                                {{ \Carbon\Carbon::parse($row->$column)->diffForHumans() }}
                            @elseif ($column === 'status')
                                <span class="badge bg-{{ $row->$column === 'Active' ? 'success' : 'danger' }}">
                                    {{ $row->$column }}
                                </span>
                            @elseif (str($row->$column)->contains('image'))
                                <img src="{{ getFilePath($row->$column) }}" alt="image" class="mb-30"
                                    style="max-width: 100%; height: 100px;">
                            @else
                                {{ $row->$column }}
                            @endif
                        </td>
                    @endif
                @endforeach
                <td class="text-center">
                    <x-data-display.data-table-action :actions="$getActions($row)" />
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ count(array_diff($columns, $ignoreColumns)) + count(array_diff($appendedColumns, $ignoreColumns)) + 2 }}"
                    class="text-center">
                    No data found
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable("#scroll-horizontal");
        });
    </script>
@endpush
