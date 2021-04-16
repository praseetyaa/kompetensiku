<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriProgram extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kategori_program';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_kp';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kategori'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
