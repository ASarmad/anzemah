<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'evidance_id',
        'upload',
        'user',
    ];

    public function evidances(){ //one to many relation
        return $this->belongsTo(Evidance::class);
    }
}
