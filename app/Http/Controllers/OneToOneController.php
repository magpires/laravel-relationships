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

        // Recupera um país já com todos os seus estados
        // $countryComNome = Country::where('name', 'Brasil')->with('states')->get()->first();

        echo $country->name;

        // Com o auxílio do metodo criado na model, capturamos a localização do país
        $location = $country->location;

        // Retorna latitude
        echo "<hr>{$location->latitude}"; 
    }

    public function oneToOneInverse() {
        $latitude = 456;
        $longitude = 654;

        // Primeiro, recuperamos a localização informando a latitude e longitude
        $location = Location::where('latitude', $latitude)->where('longitude', $longitude)->get()->first();

        // Com o one-to-one reverso, retornamos o país da localização recuperada
        // Também podemos chamar o país como método, porém, passando os métodos get e first
        $country = $location->country()->get()->first();

        echo $country->name;
    }

    public function oneToOneInsert() {
        $dataForm = [
            'name' => 'Alemanha',
            'latitude' => 890,
            'longitude' => 98,
        ];

        $country = Country::create($dataForm);

        // Após cadastrar o país, vamos armazenar sua localização

        // Adicionamos o country_id do país que foi cadastrado ao dataForm para ligarmos a localização a ele
        $dataForm['country_id'] = $country->id;
        $location = Location::create($dataForm);
    }

    public function IndexInsert() {

        return view('index-insert');
    }
    
    public function insertViaAndroid(Request $data) {

        // dd($data);

        $country = Country::create([
            'name' => $data['name'],
        ]);

        // Após cadastrar o país, vamos armazenar sua localização

        // Adicionamos o country_id do país que foi cadastrado ao $data para ligarmos a localização a ele
        $data['country_id'] = $country->id;
        
        $location = Location::create([
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'country_id' => $data['country_id']
        ]);

        return response()->json(array(
            'mensagem' => 'Cadastrado com sucesso'
        ));
    }
}
