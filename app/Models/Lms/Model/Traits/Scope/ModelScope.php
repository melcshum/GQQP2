<?php

namespace App\Models\Lms\Model\Traits\Scope;


trait ModelScope
{

    /**
     * @param $query
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeActive($query, $status = true)
    {
        return $query->where('status', $status);
    }
}

