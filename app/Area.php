<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'areas';

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
    protected $fillable = ['district', 'thana'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
