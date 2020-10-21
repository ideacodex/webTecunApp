<?php

use Illuminate\Database\Seeder;
use App\Store;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $if_exist_status = Store::first();

        if (!$if_exist_status){
            $record= new Store();
            $record->name='Guatemala';
            $record->address='3a. Calle 3-60, Zona 9, Guatemala.';
            $record->schedule='Lunes a Viernes: 08:00 am a 06:00 pm';
            $record->maps='https://www.waze.com/ul?q=grupotecunGuatemala';
            $record->save();

            $record= new Store();
            $record->name='Santa Lucía';
            $record->address='Km 86.5 Carretera a Santa Lucía Cotzumalguapa, Escuintla. ';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm
            Sábado: 08:00 am a 12:00 pm';
            $record->maps='https://www.waze.com/ul?q=grupotecunGuatemala';
            $record->save();

            $record= new Store();
            $record->name='Petén';
            $record->address='1a. Av. Y 1a. Calle Ciudad Satélite
            Finca Pontehill, Santa Elena, Petén';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm
            Sábado: 08:00 am a 12:00 pm ';
            $record->maps='https://www.waze.com/ul?q=grupotecunGuatemala';
            $record->save();

            $record= new Store();
            $record->name='Retalhuleu';
            $record->address='Km 179 San Sebastián, Retalhuleu.';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm
            Sábado: 08:00 am a 12:00 pm ';
            $record->maps='https://www.waze.com/ul?q=grupotecunGuatemala';
            $record->save();

            $record= new Store();
            $record->name='Quetzaltenango';
            $record->address='Diagonal 2, 33-18, zona 8, DIDEA Xela, Quetzaltenango.';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm
            Sábado: 08:00 am a 12:00 pm';
            $record->maps='https://www.waze.com/ul?q=grupotecunGuatemala';
            $record->save();

            $record= new Store();
            $record->name='Río Hondo';
            $record->address=' Km 126.5 Carretera al Atlántico, Santa Cruz, Río Hondo, Zacapa. ';
            $record->schedule='     Lunes a Viernes: 08:00 am a 05:00 pm
            Sábado: 08:00 am a 12:00 pm';
            $record->maps='https://www.waze.com/ul?q=grupotecunGuatemala';
            $record->save();



    }
}
}