<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function oneToMany() {
        $country = Country::where('name', 'Brasil')->get()->first();

        // Retornando vários países, onde não se tem um nome específico de um país

        $countries = Country::where('name', 'LIKE', "%a%")->get();

        echo $country->name;

        $states = $country->states;

        // Também se pode retornar em formato de método
        // $states = $country->states()->get();

        // A vantagem de se retornar em formato de método é a de que se pode fazer condições. Ex: 

        // $states = $country->states()->where('initials', 'GO')->get();

        foreach ($states as $state) {
            echo "<hr>{$state->initials} - {$state->name}";
        }

        echo '<hr>';

        // Foreach para exibir somente os paises que tenham a letra A
        foreach ($countries as $country) {
            echo "<b>{$country->name}</b>";

            $states = $country->states;
            
            foreach ($states as $state) {
                echo "<br>{$state->initials} - {$state->name}";
            }

            echo '<hr>';
        }
    }
}
