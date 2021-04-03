<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function weeks()
    {
        return $this->hasMany(Package_weeks::class,'package_id');
    }

}
