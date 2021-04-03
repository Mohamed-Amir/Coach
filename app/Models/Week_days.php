<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Week_days extends Model
{
    public function week_days()
    {
        return $this->belongsTo('App\Models\Package_weeks','week_id');
    }
}
