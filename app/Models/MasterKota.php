<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKota extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_master_kota';
    protected $table      = 'master_kota';
    protected $guarded    = [];
}
