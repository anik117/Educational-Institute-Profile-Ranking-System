<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Area;

class AreaHead extends Model
{
    public function areas()
    {
        return $this->belongsTo(Area::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
