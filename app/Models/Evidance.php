<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evidance extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic',
        'question',
    ];

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class,'certificate_id','id');
    }  

    public function uploads(): HasMany
    {
        return $this->hasMany(Upload::class,'evidance_id','id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class,'evidance_id','id');
    }
}
