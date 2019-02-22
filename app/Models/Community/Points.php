<?php

namespace App\Models\Community;

use App\Models\Model;

class Points extends Model
{
    protected $fillable = ['points', 'reason'];

    public function awardable()
    {
        return $this->morphTo();
    }
}
