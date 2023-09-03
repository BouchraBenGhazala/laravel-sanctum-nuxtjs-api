<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class technologie_projet extends Model
{
    use HasFactory;
    protected $table ='technologie_projets';
    protected $fillable = [
        'technologie_id',
        'projet_id'
    ];
}
