<?php

namespace App\View\Components\DataDisplay;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;

class DataTable extends Component
{
    public Collection $rows;
    public array $extraActions;
    public bool $showCreatedAt;
    public bool $showUpdatedAt;
    public array $columnsToIgnore;
    public array $ignoreActions;

    public function __construct(
        $rows,
        array $extraActions = [],
        bool $showCreatedAt = false,
        bool $showUpdatedAt = false,
        array $columnsToIgnore = [],
        array $ignoreActions = []
    ) {
        $this->rows = collect($rows);
        $this->extraActions = $extraActions;
        $this->showCreatedAt = $showCreatedAt;
        $this->showUpdatedAt = $showUpdatedAt;
        $this->columnsToIgnore = $columnsToIgnore;
        $this->ignoreActions = $ignoreActions;
    }

    /**
     * Get default and extra actions for a row.
     */
    public function getActions(Model $row): array
    {
        $defaultActions = $this->getDefaultActions($row);
        $extraActions = $this->getExtraActions($row);

        return array_merge($defaultActions, $extraActions);
    }

    /**
     * Get default actions for a row.
     */
    protected function getDefaultActions(Model $row): array
    {
        $actions = [];
        $routes = [
            'edit' => ['method' => 'GET', 'icon' => 'ri-pencil-fill'],
            'destroy' => ['method' => 'DELETE', 'icon' => 'ri-delete-bin-fill'], // Use 'destroy' instead of 'delete'
            'show' => ['method' => 'GET', 'icon' => 'ri-eye-fill'],
        ];

        foreach ($routes as $action => $details) {
            $routeName = $row->getTable() . '.' . $action;

            if (Route::has($routeName)) {
                $actions[$action] = [
                    'title' => ucfirst($action),
                    'method' => $details['method'],
                    'icon' => $details['icon'],
                    'route' => route($routeName, $row->id),
                ];
            } else {
                logger("Route not found: {$routeName}");
            }
        }

        return array_diff_key($actions, array_flip($this->ignoreActions));
    }

    /**
     * Get extra actions for a row.
     */
    protected function getExtraActions(Model $row): array
    {
        return collect($this->extraActions)->map(function ($action) use ($row) {
            return [
                'title' => $action['title'],
                'method' => $action['method'],
                'icon' => $action['icon'],
                'route' => route($action['route'], $row->id),
            ];
        })->toArray();
    }

    /**
     * Filter visible columns for the table.
     */
    public function getVisibleColumns(): array
    {
        if ($this->rows->isEmpty()) {
            return [];
        }

        $attributes = $this->rows->first()->getAttributes();

        return array_filter(array_keys($attributes), function ($column) {
            return !in_array($column, $this->columnsToIgnore) &&
                (!in_array($column, ['id', 'created_at', 'updated_at']) ||
                    ($this->showCreatedAt && $column === 'created_at') ||
                    ($this->showUpdatedAt && $column === 'updated_at'));
        });
    }

    /**
     * Render the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data-display.data-table', [
            'columns' => $this->getVisibleColumns(),
        ]);
    }
}
