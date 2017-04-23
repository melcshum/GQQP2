<?php

namespace App\Models\Lms\iftutorialQuestion\Traits\Scope;


trait ifTutorialQuestionScope
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

