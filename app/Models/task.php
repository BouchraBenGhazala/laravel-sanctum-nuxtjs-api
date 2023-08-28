<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class task extends Model
{
    use HasFactory,SoftDeletes;

    protected $table ='tasks';
    protected $fillable = [
        'title', 
        'description', 
        'priority',
        'type',
        'due_date'
    ];

}
