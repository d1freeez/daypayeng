<?php

namespace App\Helper;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait FilterableByRole
{
    /**
     * Scope a query to only include filtered by role items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return void
     */
    public function scopeFilterByRole(Builder $builder): void
    {
        $user = request()->user();
        foreach ($this->getRoleFilterColumns() as $filter) {
            $user_type = $filter['user_type'];
            $column = $filter['column'];
            if (is_array($user_type)) {
                if (in_array($user->type, $user_type)) {
                    $this->getQuery($builder, $column, $user);
                }
            } elseif ($user_type == 'all') {
                $this->getQuery($builder, $column, $user);
            } else {
                if ($user->type == $user_type) {
                    $this->getQuery($builder, $column, $user);
                }
            }
        }
    }

    protected function getQuery(
        Builder $builder,
        string|array $column,
        User $user
    ): void {
        if (is_array($column)) {
            if (array_key_exists('default', $column)) {
                $builder->where($column['name'], $column['default']);
            } elseif (array_key_exists('has', $column)) {
                $builder->whereHas($column['has'], function (
                    Builder $builder
                ) use ($column, $user) {
                    if ($column['name'] == 'owning_department_id') {
                        if ($user->departments()->exists()) {
                            $columnValue = $user->departments()->first()->id;
                            $column['name'] = 'department_id';
                        }
                    } else {
                        $columnValue = $user->getAttribute($column['name']);
                    }
                    $builder->where(
                        $column['name'],
                        $columnValue
                    );
                });
            } else {
                $builder->where(
                    $column['name'],
                    $user->$column['name']
                );
            }
        } else {
            $builder->where($column, $user->getAttribute($column));
        }
    }

    public function getRoleFilterColumns(): array
    {
        return $this->role_filter;
    }
}