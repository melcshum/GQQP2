<?php

namespace App\Models\Lms\fillQuestion\Traits\Scope;


trait fillQuestionScope
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

