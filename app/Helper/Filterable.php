<?php

namespace App\Helper;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * Scope a query to only include filtered items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function scopeFilter(Builder $builder): void
    {
        $request = request();
        foreach ($this->getFilterableColumns() as $column) {
            if ($request->has($column)) {
                $builder->where($column, $request->get($column));
            }
        }
    }

    protected function getFilterableColumns(): array
    {
        return $this->filterable_columns;
    }
}
