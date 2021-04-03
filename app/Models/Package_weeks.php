<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package_weeks extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function days()
    {
        return $this->hasMany(Week_days::class,'week_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package_weeks()
    {
        return $this->belongsTo('App\Models\Packages','package_id');
    }
}
