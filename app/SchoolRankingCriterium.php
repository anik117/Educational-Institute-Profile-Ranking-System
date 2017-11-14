<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolRankingCriterium extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'school_ranking_criterias';

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
    protected $fillable = ['pass', 'attendance', 'students', 'teachers', 'fee', 'class', 'school_id'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    
}
