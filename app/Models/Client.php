<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class,'client_id','id');
    }

    public function evidances(): HasMany
    {
        return $this->hasMany(Evidance::class);
    }
   
}