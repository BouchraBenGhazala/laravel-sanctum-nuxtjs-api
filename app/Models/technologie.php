<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class technologie extends Model
{
    use HasFactory;
    protected $table ='technologies';
    protected $fillable = [
        'name', 
    ];

    public function projets()
    {
        return $this->belongsToMany(Projet::class);
    }
}
