<?php

namespace App\Models\Lms\mcQuestion\Traits\Scope;


trait mcQuestionScope
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

