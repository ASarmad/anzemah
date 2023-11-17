<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Certificate extends Model
{
    use HasFactory;

    public function clients(){ //one to many relation
        return $this->belongsTo(Client::class);
    }

    public function evidances(): HasMany
    {
        return $this->hasMany(Evidance::class,'certificate_id','id');
    }
}
