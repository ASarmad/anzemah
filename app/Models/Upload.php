<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'evidance_id',
    ];

    public function evidances(){ //one to many relation
        return $this->belongsTo(Evidance::class);
    }
}
