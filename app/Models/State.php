<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    
    // Retorna o país ao qual um estado pertence
    public function country() {
        return $this->belongsTo(Country::class);
    }
}
