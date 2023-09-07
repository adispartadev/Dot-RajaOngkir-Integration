<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProvinsi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_master_provinsi';
    protected $table      = 'master_provinsi';
    protected $guarded    = [];
}
