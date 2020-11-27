<?php

use Illuminate\Database\Seeder;

use App\Question;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $if_exist_status = Question::first();

        if (!$if_exist_status){
            $question = new Question();
            $question->description = 'Cuales es el color primario de Grupo Tecun?';
            $question->url_image = null;
            $question->save();

            $question = new Question();
            $question->description = 'Cuantas semanas tiene 1 mes?';
            $question->url_image = null;
            $question->save();

            $question = new Question();
            $question->description = 'Cuantos años tiene Grupo Tecun en el mercado?';
            $question->url_image = null;
            $question->save();
        }
    }
}
