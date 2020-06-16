<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    // A function abaixo trará todas as empresas de uma cidade
    public function companies() {
        // Como a tabela pivor foi criada com a nomeclatura indevida (vide nota deixada na migration de company_city), teremos que fazer
        // um padrão diferente do que costumamos fazer nos returns de relacionamentos, onde iremos informar ao Laravel o nome da tabela
        // que estamos usando, pois ele espera por uma nomeclatura padrão não implementada por nós.
        return $this->belongsToMany(Company::class, 'company_city_');
    }
}
