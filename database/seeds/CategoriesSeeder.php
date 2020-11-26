<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $if_exist = Category::first();

        if (!$if_exist){
            $record= new Category();
            $record->name='Desarrollo Organizacional';
            $record->save();

            $record= new Category();
            $record->name='Auditoría';
            $record->save();

            $record= new Category();
            $record->name='Finanzas';
            $record->save();

            $record= new Category();
            $record->name='Automotores';
            $record->save();

            $record= new Category();
            $record->name='Comercial';
            $record->save();

            $record= new Category();
            $record->name='Salud y Seguridad';
            $record->save();
        }

    }
}
