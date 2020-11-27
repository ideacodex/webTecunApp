<?php

use Illuminate\Database\Seeder;
use App\Answer;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $if_exist_status = Answer::first();

        if (!$if_exist_status){
            $answer = new Answer();
            $answer->reply = 'Naranja';
            $answer->flag = 1;
            $answer->question_id = 1;
            $answer->save();

            $answer = new Answer();
            $answer->reply = 'Verde';
            $answer->flag = 0;
            $answer->question_id = 1;
            $answer->save();

            $answer = new Answer();
            $answer->reply = 'Rojo';
            $answer->flag = 0;
            $answer->question_id = 1;
            $answer->save();

            $answer = new Answer();
            $answer->reply = 'Gris';
            $answer->flag = 0;
            $answer->question_id = 1;
            $answer->save();

            $answer = new Answer();
            $answer->reply = '4 semanas';
            $answer->flag = 1;
            $answer->question_id = 2;
            $answer->save();

            $answer = new Answer();
            $answer->reply = '8 semanas';
            $answer->flag = 0;
            $answer->question_id = 2;
            $answer->save();

            $answer = new Answer();
            $answer->reply = '2 Quincenas';
            $answer->flag = 0;
            $answer->question_id = 2;
            $answer->save();

            $answer = new Answer();
            $answer->reply = '30 dias';
            $answer->flag = 0;
            $answer->question_id = 2;
            $answer->save();

            $answer = new Answer();
            $answer->reply = '65 años';
            $answer->flag = 1;
            $answer->question_id = 3;
            $answer->save();

            $answer = new Answer();
            $answer->reply = '60 años';
            $answer->flag = 0;
            $answer->question_id = 3;
            $answer->save();

            $answer = new Answer();
            $answer->reply = '30 años';
            $answer->flag = 0;
            $answer->question_id = 3;
            $answer->save();

            $answer = new Answer();
            $answer->reply = '100 años';
            $answer->flag = 0;
            $answer->question_id = 3;
            $answer->save();
        }
    }
}
