<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Company;

class ManyToManyController extends Controller
{
    public function manyToMany() {
        $city = City::where('name', 'SÃO PAULO')->get()->first();

        echo "<b>{$city->name}</b>";

        $companies = $city->companies;

        foreach ($companies as $company) {
            echo " {$company->name}, ";
        }
    }

    public function manyToManyInverse() {
        $company = Company::where('name', 'EspecializaTi')->get()->first();

        echo "<b>{$company->name}</b>";

        $cities = $company->cities;

        foreach ($cities as $city) {
            echo " {$city->name}, ";
        }
    }

    // Vamos viincular uma empresa a uma ou mais cidades
    public function manyToManyInsert() {
        $dataForm = ["1"];
        
        $company = Company::find(1);

        echo "<b>{$company->name}</b>";

        // O método attach irá percorrer o $dataForm em busca dos ids das cidades ao qual irá vincular a empresa
        // $company->cities()->attach($dataForm);

        // O método sync funciona semelhante ao attach. A diferença aqui é que este método não incrementa no banco, apenas sincroniza.
        // O método sync só irá inserir novos dados caso estes dados sejam diferentes dos já existentes no banco.
        // Se um ou mais IDs forem apagados do array dataForm, o sync também irá removê-los do banco.
        // $company->cities()->sync($dataForm);

        // O método detach() é o oposto do attach. Ele remove uma ou mais cidades pelos ids passados para ele.
        $company->cities()->detach([1]);
        
        $cities = $company->cities;

        foreach ($cities as $city) {
            echo " {$city->name}, ";
        }
    }
}
