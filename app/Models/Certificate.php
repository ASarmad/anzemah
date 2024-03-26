<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'status',
        'type',
        'year',
        'version',
        'ref_number',
        'targetdate',
        'lastdate',
        'certificate_pdf',
    ];

    public function clients(){ //one to many relation
        return $this->belongsTo(Client::class,'client_id','id');
    }

    public function evidances(): HasMany
    {
        return $this->hasMany(Evidance::class,'certificate_id','id');
    }
}
