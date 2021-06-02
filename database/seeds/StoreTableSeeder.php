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
            $record->number = '+502 23288888';
            $record->waze='https://ul.waze.com/ul?preview_venue_id=176619666.1766065589.1119473&navigate=yes';
            $record->maps='https://goo.gl/maps/zRztEAJrRD3VXxEt5';
            $record->save();

            $record= new Store();
            $record->name='Hyundai Roosevelt';
            $record->address='Calzada Roosevelt 18-23 Zona 11';
            $record->schedule='Lunes a viernes: 8:oo am / 7:00 pm Sábado: 8:00 am / 5:00 pm Domingo: 10:00 am a 5:00 pm';
            $record->number = '+502 23288879';
            $record->waze='https://ul.waze.com/ul?preview_venue_id=176619666.1765868982.2147455&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location';
            $record->maps='https://goo.gl/maps/EYxhipDvLg4mELQU8';
            $record->save();

            $record= new Store();
            $record->name='Didea Zona 9';
            $record->address='1ra Calle 7-69 zona 9';
            $record->schedule='Lunes a viernes: 8:oo am / 5:00 pm Sábado: 8:00 am / 3:00 pm Domingo: Cerrado';
            $record->number = '+502 23288881';
            $record->waze='https://ul.waze.com/ul?preview_venue_id=176619666.1766131125.2236623&navigate=yes&utm_campaign=waze_website&utm_source=waze_website&utm_medium=lm_share_location';
            $record->maps='https://goo.gl/maps/rvNz5ohuS2Je14nq9';
            $record->save();

            $record= new Store();
            $record->name='Didea Majadas';
            $record->address='Majadas 28 Av. 5-20 Z. 11';
            $record->schedule='Lunes a viernes: 7:oo am / 5:30 pm Sábado: 7:00 am / 12:00 pm Domingo: Cerrado';
            $record->number = '+502 23288880';
            $record->waze='https://ul.waze.com/ul?preview_venue_id=176554130.1765803446.10792480&navigate=yes&utm_campaign=waze_website&utm_source=waze_website&utm_medium=lm_share_location';
            $record->maps='https://goo.gl/maps/VevRKiZgu45oAchE9';
            $record->save();

            $record= new Store();
            $record->name='Autos Premier';
            $record->address='Petapa 36-09 zona 12';
            $record->schedule='Lunes a viernes: 7:oo am / 5:30 pm Sábado: 7:00 am / 12:00 pm Domingo: Cerrado';
            $record->number = '+502 23288880';
            $record->waze='https://ul.waze.com/ul?ll=14.60526980%2C-90.53910730&navigate=yes&utm_campaign=waze_website&utm_source=waze_website&utm_medium=lm_share_location';
            $record->maps='https://goo.gl/maps/k4ainh2cp7yjDBvV6';
            $record->save();

            $record= new Store();
            $record->name='PDI - Amatitlán';
            $record->address='Zona Franca Amatitlán';
            $record->schedule='Lunes a Viernes: 08:00 am a 06:00 pm';
            $record->number = '+502 23288880';
            $record->waze='https://ul.waze.com/ul?place=ChIJyXOdaZgHiYURlrdG-g9_hYA&ll=14.47018360%2C-90.63399190&navigate=yes&utm_campaign=waze_website&utm_source=waze_website&utm_medium=lm_share_location';
            $record->maps='https://goo.gl/maps/VkoWMed6gj3gtGCd8';
            $record->save();

            $record= new Store();
            $record->name='Agencia Multimarca Quetzaltenango';
            $record->address='Diagonal 2, 33-18, zona 8, DIDEA Xela, Quetzaltenango';
            $record->schedule= 'Lunes a Viernes: 08:00 am a 05:00 pm Sábado: 08:00 am a 12:00 pm';
            $record->number = '+502 23288888';
            $record->waze='https://ul.waze.com/ul?place=ChIJk1EV16CijoURPR2xd8pP0-U&ll=14.85898840%2C-91.51863860&navigate=yes';
            $record->maps='https://goo.gl/maps/fNSaHZJT2C8GXQKD9';
            $record->save();

            $record= new Store();
            $record->name='Agencia Multimarca Rio Hondo';
            $record->address='Km 126.5 Carretera al Atlántico, Santa Cruz, Río Hondo, Zacapa';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm Sábado: 08:00 am a 12:00 pm';
            $record->number = '+502 23288888';
            $record->waze='https://ul.waze.com/ul?place=ChIJi85QTV4gYo8RShNGA_zlVTQ&ll=15.00657760%2C-89.66519330&navigate=yes';
            $record->maps='https://g.page/AutoCentroEvoluSion?share';
            $record->save();

            $record= new Store();
            $record->name='Agencia Multimarca Santa Lucia';
            $record->address='Km 86.5 Carretera a Santa Lucía Cotzumalguapa, Escuintla.';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm Sábado: 08:00 am a 12:00 pm';
            $record->number = '+502 23288888';
            $record->waze='https://ul.waze.com/ul?place=ChIJwfJa2_wmiYURiYJ4iofL5jY&ll=14.33395500%2C-91.01180150&navigate=yes';
            $record->maps='';
            $record->save();

            $record= new Store();
            $record->name='Agencia Multimarca Carretera a El Salvador';
            $record->address='Carretera a El Salvador KM.16.5 Parque Automotriz';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm Sábado: 08:00 am a 12:00 pm';
            $record->number = '+502 23288888';
            $record->waze='https://ul.waze.com/ul?preview_venue_id=176619665.1766524334.17186114&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location';
            $record->maps='https://goo.gl/maps/zoGFFwoiXCkzxP91A';
            $record->save();

            $record= new Store();
            $record->name='Blue Box Peugeot';
            $record->address='Carretera a El Salvador KM.16.5 Parque Automotriz';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm Sábado: 08:00 am a 12:00 pm';
            $record->number = '+502 23288888';
            $record->waze='https://ul.waze.com/ul?preview_venue_id=176619665.1766524334.17186114&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location';
            $record->maps='https://goo.gl/maps/KzGx3Ba1k2RMeKdY6';
            $record->save();

            $record= new Store();
            $record->name='Centro de Servicio Multimarca 19 calle';
            $record->address='19 Calle 17-37';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm Sábado: 08:00 am a 12:00 pm';
            $record->number = '+502 23288888';
            $record->waze='https://ul.waze.com/ul?ll=14.59746120%2C-90.54194860&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location';
            $record->maps='https://ul.waze.com/ul?ll=14.59746120%2C-90.54194860&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location';
            $record->save();

            $record= new Store();
            $record->name='Centro de Servicio Multimarca Vistares';
            $record->address='Avenida Petapa 36 calle, Sótano 1 Centro Comercial Vistares';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm Sábado: 08:00 am a 12:00 pm';
            $record->number = '+502 23288888';
            $record->waze='https://ul.waze.com/ul?place=ChIJoZxvI8OhiYUR4pHi2a6gvMk&ll=14.58329140%2C-90.54459440&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location';
            $record->maps='https://goo.gl/maps/Q2qHFCwGFvjnJAqA9';
            $record->save();

            $record= new Store();
            $record->name='Petén';
            $record->address='1a. Av. Y 1a. Calle Ciudad Satélite
            Finca Pontehill, Santa Elena, Petén';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm
            Sábado: 08:00 am a 12:00 pm ';
            $record->number = '+502 23288888';
            $record->waze='https://ul.waze.com/ul?place=ChIJMwbABS2NX48RAeO5SRcqSf4&ll=16.91470700%2C-89.88040570&navigate=yes';
            $record->maps='https://goo.gl/maps/DiCyrSgcvGPsqkDP8';
            $record->save();

            $record= new Store();
            $record->name='Retalhuleu';
            $record->address='Km 179 San Sebastián, Retalhuleu.';
            $record->schedule='Lunes a Viernes: 08:00 am a 05:00 pm
            Sábado: 08:00 am a 12:00 pm ';
            $record->number = '+502 23288888';
            $record->waze='https://ul.waze.com/ul?place=ChIJ4SSo5drtjoUROg2MiAHlddQ&ll=14.56941970%2C-91.64885360&navigate=yes';
            $record->maps='https://goo.gl/maps/NR81je5G3Te8eKQXA';
            $record->save();
        }
    }
}