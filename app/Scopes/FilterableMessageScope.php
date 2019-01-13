<?php

namespace App\Scopes;

use DB;
use Request;

trait FilterableMessageScope
{
    /**
     * Array of input used to filter the query.
     *
     * @var array
     */
    private $filtered = [];

    /**
     * Creates local scope to run the filter.
     *
     * @param \Illuminate\Database\Query\Builder $query
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeFilterable($query)
    {
        $this->filtered = Request::only([
            'searchText',
            'searchBy',
            'type',
            'server_id',
            'date'
        ]);

        $this->filterDate($query)
            ->filterServer($query)
            ->filterIgnoreMessage($query)
            ->filterTypes($query);


        return $query;
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     *
     * @return FilterableMessageScope
     */
    private function filterDate($query)
    {
        if ($this->filtered['date'] && !!strtotime($this->filtered['date']))
        {
            $query->where(DB::raw('DATE(FROM_UNIXTIME(`timestamp`))'), '=', $this->filtered['date']);
        }

        return $this;
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     *
     * @return FilterableMessageScope
     */
    private function filterServer($query)
    {
        $serverId = (int) $this->filtered['server_id'];

        if (!empty($serverId) && $serverId > 0)
        {
            $query->where('server_id', '=', $serverId);
        }

        return $this;
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     *
     * @return FilterableMessageScope
     */
    private function filterIgnoreMessage($query)
    {
        $ignoreText = config('main.ignoreTexts');

        if ($ignoreText && !empty($ignoreText))
        {
            $query->whereNotIn('message', $ignoreText);
        }

        return $this;
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     *
     * @return FilterableMessageScope
     */
    private function filterTypes($query)
    {
        $types = $this->getTypes();

        if (!empty($types['allow']))
        {
            $query->whereIn('type', $types['allow']);
        }

        if (!empty($types['ignore']))
        {
            $query->whereNotIn('type', $types['ignore']);
        }

        return $this;
    }

    /**
     * @param void
     *
     * @return array
     */
    private function getTypes()
    {
        $ignoreTypes = config('main.ignoreTypes');

        $allTypes = [
            'say',
            'say_team',
            'sm_csay',
            'sm_hsay',
            'sm_msay',
            'sm_tsay',
            'sm_psay',
            'sm_say',
            'sm_chat'
        ];

        $allowTypes = array_filter(explode(',', $this->filtered['type']), function($type) use($ignoreTypes, $allTypes) {
            return in_array($type, $allTypes) && !in_array($type, $ignoreTypes);
        });

        return [
            'ignore' => $ignoreTypes,
            'allow' => $allowTypes
        ];
    }

}