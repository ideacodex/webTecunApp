<?php

use Illuminate\Database\Seeder;

use App\Question;
use App\Answer;

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
            $question1 = new Question();
            $question1->description = 'Cuales es el color primario de Grupo Tecun?';
            $question1->url_image = null;
            $question1->save();

            $answer = new Answer();
            $answer->reply = 'Naranja';
            $answer->flag = 1;
            $answer->question_id = $question1->id;
            $answer->save();

            $answer = new Answer();
            $answer->reply = 'Verde';
            $answer->flag = 0;
            $answer->question_id = $question1->id;
            $answer->save();

            $answer = new Answer();
            $answer->reply = 'Rojo';
            $answer->flag = 0;
            $answer->question_id = $question1->id;
            $answer->save();

            $answer = new Answer();
            $answer->reply = 'Gris';
            $answer->flag = 0;
            $answer->question_id = $question1->id;
            $answer->save();

            $question2 = new Question();
            $question2->description = 'Cuantas semanas tiene 1 mes?';
            $question2->url_image = null;
            $question2->save();

            $answer = new Answer();
            $answer->reply = '4 semanas';
            $answer->flag = 1;
            $answer->question_id = $question2->id;
            $answer->save();

            $answer = new Answer();
            $answer->reply = '8 semanas';
            $answer->flag = 0;
            $answer->question_id = $question2->id;
            $answer->save();

            $answer = new Answer();
            $answer->reply = '2 Quincenas';
            $answer->flag = 0;
            $answer->question_id = $question2->id;
            $answer->save();

            $answer = new Answer();
            $answer->reply = '30 dias';
            $answer->flag = 0;
            $answer->question_id = $question2->id;
            $answer->save();

            $question3 = new Question();
            $question3->description = 'Cuantos años tiene Grupo Tecun en el mercado?';
            $question3->url_image = null;
            $question3->save();

            $answer = new Answer();
            $answer->reply = '65 años';
            $answer->flag = 1;
            $answer->question_id = $question3->id;
            $answer->save();

            $answer = new Answer();
            $answer->reply = '60 años';
            $answer->flag = 0;
            $answer->question_id = $question3->id;
            $answer->save();

            $answer = new Answer();
            $answer->reply = '30 años';
            $answer->flag = 0;
            $answer->question_id = $question3->id;
            $answer->save();

            $answer = new Answer();
            $answer->reply = '100 años';
            $answer->flag = 0;
            $answer->question_id = $question3->id;
            $answer->save();
        }
    }
}
