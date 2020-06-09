<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    public function oneToOne() {
        $country = Country::find(1);

        // Serve para pesquisar por um país apenas com o seu nome.
        // Para exibir seus dados com relationships, basta fazer exatamente igual ao que foi feito em $country
        $countryComNome = Country::where('name', 'Brasil')->get()->first();

        echo $country->name;

        // Com o auxílio do metodo criado na model, capturamos a localização do país
        $location = $country->location;

        // Retorna latitude
        echo "<hr>{$location->latitude}"; 
    }
}
