<?php

namespace Geeksdevelop\Translate\Models;

use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'locale', 'type', 'value'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'locale', 'type',
    ];

    public function translable()
    {
        return $this->morpgTo();
    }
}
