<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Filterable
{
    /**
     * Filter conditions from request
     *
     * @param $query
     * @param $request
     *
     * return $query
     * @return mixed
     */
    public function scopeFilter($query, $request): mixed
    {
        foreach ($request as $field => $value) {
            if ($value == null || $value == '') {
                continue;
            }

            $method = 'filter' . Str::studly($field);
            if (method_exists($this, $method)) {
                $this->{$method}($query, $value);
            }
        }
        return $query;
    }
}
