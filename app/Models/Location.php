<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function country() {
        return $this->belongsTo(Country::class);

        // Quando criamos a chave estrangeira com um nome que foje do padrão do Laravel, retornamos desta forma:
        // return $this->belongsTo(Country::class, 'colunaRelacionamento');

        // Se a coluna id da tabela tiver um nome diferente, também devemos informar ao retornar:
        // return $this->belongsTo(Country::class, 'colunaRelacionamento', 'id_diferente');
    }
}
