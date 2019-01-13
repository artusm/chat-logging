<?php

namespace App\Scopes;

trait SearchableScope
{
    /**
     * Creates local scope to run the search.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string $searchText
     * @param string $searchBy
     * @param array $searchColumns
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSearchable($query, $searchText, $searchBy, array $searchColumns)
    {
        if ($searchBy && $searchText) {
            $query->where(in_array($searchBy, $searchColumns) ? $searchBy : $searchColumns[0], 'like', "%$searchText%");
        }

        return $query;
    }
}