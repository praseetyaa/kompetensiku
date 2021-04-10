<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriMateri extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kategori_materi';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_km';

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
