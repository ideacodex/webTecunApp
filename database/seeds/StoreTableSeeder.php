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
            $record->number = '+502 2328888';
            $record->maps='https://ul.waze.com/ul?preview_venue_id=176619666.1766065589.1119473&navigate=yes';
            $record->save();

            $record= new Store();
            $record->name='Santa Lucía';
            $record->address='Km 86.5 Carretera a Santa Lucía Cotzumalguapa, Escuintla. ';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm
            Sábado: 08:00 am a 12:00 pm';
            $record->number = '+502 2328888';
            $record->maps='https://ul.waze.com/ul?place=ChIJwfJa2_wmiYURiYJ4iofL5jY&ll=14.33395500%2C-91.01180150&navigate=yes';
            $record->save();

            $record= new Store();
            $record->name='Petén';
            $record->address='1a. Av. Y 1a. Calle Ciudad Satélite
            Finca Pontehill, Santa Elena, Petén';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm
            Sábado: 08:00 am a 12:00 pm ';
            $record->number = '+502 2328888';
            $record->maps='https://ul.waze.com/ul?place=ChIJMwbABS2NX48RAeO5SRcqSf4&ll=16.91470700%2C-89.88040570&navigate=yes';
            $record->save();

            $record= new Store();
            $record->name='Retalhuleu';
            $record->address='Km 179 San Sebastián, Retalhuleu.';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm
            Sábado: 08:00 am a 12:00 pm ';
            $record->maps='https://ul.waze.com/ul?place=ChIJ4SSo5drtjoUROg2MiAHlddQ&ll=14.56941970%2C-91.64885360&navigate=yes';
            $record->save();

            $record= new Store();
            $record->name='Quetzaltenango';
            $record->address='Diagonal 2, 33-18, zona 8, DIDEA Xela, Quetzaltenango.';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm
            Sábado: 08:00 am a 12:00 pm';
            $record->number = '+502 2328888';
            $record->maps='https://ul.waze.com/ul?place=ChIJk1EV16CijoURPR2xd8pP0-U&ll=14.85898840%2C-91.51863860&navigate=yes';
            $record->save();

            $record= new Store();
            $record->name='Río Hondo';
            $record->address=' Km 126.5 Carretera al Atlántico, Santa Cruz, Río Hondo, Zacapa. ';
            $record->schedule='     Lunes a Viernes: 08:00 am a 05:00 pm
            Sábado: 08:00 am a 12:00 pm';
            $record->number = '+502 2328888';
            $record->maps='https://ul.waze.com/ul?place=ChIJi85QTV4gYo8RShNGA_zlVTQ&ll=15.00657760%2C-89.66519330&navigate=yes';
            $record->save();
        }
    }
}