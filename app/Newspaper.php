<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newspaper extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'newspapers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'website',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener todos los posts de un diario.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
