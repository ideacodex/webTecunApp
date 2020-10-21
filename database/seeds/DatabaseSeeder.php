<?php

use Illuminate\Database\Seeder;
use App\Status;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $if_exist_status = Status::first();

        if (!$if_exist_status){
            $record= new Status();
            $record->name='Activo';
            $record->icon='fas fa-exclamation';
            $record->color='success';
            $record->save();

            $record= new Status();
            $record->name='Inactivo';
            $record->icon='fas fa-exclamation';
            $record->color='dark';
            $record->save();

            $record= new Status();
            $record->name='Proceso';
            $record->icon='fas fa-exclamation';
            $record->color='primary';
            $record->save();

            $record= new Status();
            $record->name='Cancelado';
            $record->icon='fas fa-exclamation';
            $record->color='danger';
            $record->save();
    }
}
