<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'folder';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_folder';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_folder', 'jenis_folder', 'dir_folder', 'folder_parent', 'folder_icon', 'modified_at', 'folder_at',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
