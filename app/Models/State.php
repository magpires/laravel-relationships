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

    // O método a seguir irá retornar todos os comentários de um estado.
    public function comments() {
        // Devemos informar ao método morphManny a classe Comment e o método que faz o relacionamento entre os comentários e o estado.
        // Nesse caso, o método é o Commentable.
        return $this->morphMany(Comment::class, 'commentable');
    }
}
