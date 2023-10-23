<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;

    public function etapa(){
        return $this->hasMany(Etapa::class);
    }

    public function user(){
        return $this->belongsto(User::class,'persona_id');
    }

    public function compartido(){
        return $this->hasMany(Compartido::class);
    }
}
