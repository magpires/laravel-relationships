<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    
    protected $fillable = ['name', 'initials', 'country_id'];

    // Retorna o país ao qual um estado pertence
    public function country() {
        return $this->belongsTo(Country::class);
    }

    // Retorna todas as cidades de um estado.
    public function cities() {
        return $this->hasMany(City::class);
    }
}
