<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['card_id', 'name', 'hole_1', 'hole_2', 'hole_3', 'hole_4', 'hole_5', 'hole_6', 'hole_7', 'hole_8',
        'hole_9', 'hole_10', 'hole_11', 'hole_12', 'hole_13', 'hole_14', 'hole_15', 'hole_16', 'hole_17', 'hole_18'];

    /**
     * calculate total
     *
     * @return int
     */
    public function getTotalAttribute()
    {
        $result = 0;

        for ($i = 1; $i <= 18; $i++) {
            $result += $this->{'hole_'.$i};
        }

        return $result;
    }
}
