<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Comando para criar model dentro da pasta Models e a migration da model: php artisan make:model Models\Nomedamodel -m

class Country extends Model
{
    protected $fillable = ['name'];
    
    // As functions de relacionamento não só recuperam dados, como também os inserem no banco de dados.

    // Aqui começa o relationships
    // Com a ajuda da chave estrangeira em locations, podemos pegar a localização de um país de maneira muito fácil no controller,
    // bastando que a model esteja dessa maneira.
    public function location() {
        // É retornado apenas uma localização.
        return $this->hasOne(Location::class);
    }

    // Esta function retornará todos os estados de um país
    public function states() {
        return $this->hasMany(State::class);
    }
}
