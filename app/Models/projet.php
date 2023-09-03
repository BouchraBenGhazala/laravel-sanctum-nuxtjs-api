<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class projet extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ='projets';
    protected $fillable = [
        'title',
        'description',
        'slug',
        'status',
        'url',
    ];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(technologie::class,'technologie_projets');
    }

}
