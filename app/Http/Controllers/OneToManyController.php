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

    public function manyToOne() {
        $stateName = 'Pequin';
        $state = State::where('name', $stateName)->get()->first();
        echo "<b>{$state->name}</b>";

        $country = $state->country;
        dd($state);
        echo "<b>País: {$country->name}</b>";
    }

    public function oneToManyTwo() {
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

            foreach ($state->cities as $city) {
                echo "{$city->name}, ";
            }
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

    // Cadastrando um estado ao país

    public function oneToManyInsert() {
        $dataForm = [
            'name' => 'Bahia',
            'initials' => 'BA',
        ];
        
        $country = Country::find(1);

        $insertState = $country->states()->create($dataForm);

        dd($insertState);
    }

    // Outra forma de cadastrar um estado a um país.

    public function oneToManyInsertTwo() {
        $dataForm = [
            'name' => 'Bahia',
            'initials' => 'BA',
            'country_id' => '1'
        ];

        $insertState = State::create($dataForm);

        dd($insertState);
    }

    // Método para retornar todas as cidades de um país, independente do estado.
    public function hasManyThrough() {
        $country = Country::find(1);

        echo "<b>{$country->name}</b>";

        $cities = $country->cities;

        foreach ($cities as $city) {
            echo " {$city->name}, ";
        }
    }
}
