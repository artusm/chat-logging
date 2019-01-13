<?php

namespace App\Scopes;

use Request;

trait SortableScope
{
    /**
     * Creates local scope to run the sortable.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param array $types
     * @param string $defaultOrder
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSortable($query, array $types, $defaultOrder = 'msg_id')
    {
        $input = Request::only([
            'order_by',
            'descending'
        ]);

        $query->orderBy(in_array($input['order_by'], $types) ? $input['order_by'] : $defaultOrder, $input['descending'] === 'true' ? 'desc' : 'asc');

        return $query;
    }
}