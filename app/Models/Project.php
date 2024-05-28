<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    protected $fillable = [
        'title',
        'description',
        'slug',
        'github',
        'thumb',
        'type_id',
    ];
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
