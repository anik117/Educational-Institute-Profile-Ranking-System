<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schools';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'website', 'email', 'phone', 'area_id'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function headmaster()
    {
        return $this->hasOne(Headmaster::class);
    }

    public function ranking()
    {
        return $this->hasMany(SchoolRankingCriterium::class);
    }
    
}
