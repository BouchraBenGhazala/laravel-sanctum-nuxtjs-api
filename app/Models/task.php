<?php

namespace App\Models;
use App\Models\Projet;
use App\Models\User;

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
        'due_date',
        'user_id',
        'projet_id'
    ];

    public function project()
    {
        return $this->belongsTo(Projet::class,'projet_id');
    }

    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
