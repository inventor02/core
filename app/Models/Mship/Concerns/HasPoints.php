<?php

namespace App\Models\Mship\Concerns;

use App\Models\Community\Points;

trait HasPoints
{
    public function points()
    {
        return $this->morphMany(Points::class, 'awardable');
    }

    public function getPointsAttribute()
    {
        return $this->points()->sum('points');
    }

    public function awardPoints(int $points, string $reason)
    {
        $points = new Points([
            'points' => $points,
            'reason' => $reason,
        ]);

        return $this->points()->save($points);
    }
}
