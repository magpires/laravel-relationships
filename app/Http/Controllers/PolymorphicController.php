<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Comment;
use PHPUnit\Framework\Constraint\Count;

class PolymorphicController extends Controller
{
    public function polymorphic() {
        // Aqui nós exibimos os comentários de uma cidade. A mesma lógica pode ser utilizada para
        // exibir os comentários de países e estados.
        $city = City::where('name', 'GUARULHOS')->get()->first();

        echo"<b>{$city->name}</b><br>";

        $comments = $city->comments()->get();

        foreach ($comments as $comment) {
            echo "<br>{$comment->description}";
        }
    }

    public function polymorphicInsert() {
        // Fazendo comentário para uma cidade
        // $city = City::where('name', 'GUARULHOS')->get()->first();

        // echo $city->name;

        // $comment = $city->comments()->create(
        //     [
        //         'description' => "New comment {$city->name} ".date('YmdHis'),
        //     ]
        // );
        // dd($comment);

        // Fazendo comentário para um estado
        // $state = State::where('name', 'Tocantins')->get()->first();

        // echo $state->name;

        // $comment = $state->comments()->create(
        //     [
        //         'description' => "New comment {$state->name} ".date('YmdHis'),
        //     ]
        // );
        // dd($comment);

        // Fazendo comentário para um país
        $country = Country::find(1);

        echo $country->name;

        $comment = $country->comments()->create(
            [
                'description' => "New comment {$country->name} ".date('YmdHis'),
            ]
        );
        dd($comment);
    }
}
