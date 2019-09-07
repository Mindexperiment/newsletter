<?php

namespace Agpretto\Newsletter;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    /**
     * The table associated with the model
     * 
     * @var string
     */
    protected $table = 'newsletters';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     * 
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at',
    ];
}
