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

    public function clients(){ //one to many relation
        return $this->belongsTo(Client::class);
    }

    public function uploads(): HasMany
    {
        return $this->hasMany(Upload::class,'evidance_id','id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class,'comment_id','id');
    }
}
