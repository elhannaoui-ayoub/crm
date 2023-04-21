<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory,HasUuids;

    public function employe()
    {
        return $this->hasOne(Employe::class,'id','employe_id');
    }
    public function societe()
    {
        return $this->hasOne(Societe::class,'id','societe_id');
    }
}
