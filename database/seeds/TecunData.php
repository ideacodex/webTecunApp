<?php

use Illuminate\Database\Seeder;
use App\Company;

class TecunData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (!Company::first()) {
            $company = new Company;
            $company->name = "TECUN COMERCIAL";
            $company->departament = "Técnica Universal";
            $company->email = "fpineda@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "TECUN COMERCIAL";
            $company->departament = "Servicios Administrativos técnicos";
            $company->email = "fpineda@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "TECUN COMERCIAL";
            $company->departament = "Químicos Agrícolas Insectrol";
            $company->email = "fpineda@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "TECUN COMERCIAL";
            $company->departament = "Tecun Arrendadora";
            $company->email = "fpineda@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "TECUN COMERCIAL";
            $company->departament = "El Salvador";
            $company->email = "rbeltran@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "TECUN COMERCIAL";
            $company->departament = "Honduras";
            $company->email = "mrivera@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "TECUN AUTOMOTORES";
            $company->departament = "Distribuidora de Automóviles";
            $company->email = "mrivera@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "TECUN AUTOMOTORES";
            $company->departament = "Repuestos Napa";
            $company->email = "mrivera@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "TECUN AUTOMOTORES";
            $company->departament = "Distribuidora de Automóviles, Xela";
            $company->email = "mrivera@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "TECUN AUTOMOTORES";
            $company->departament = "Autos Europa";
            $company->email = "mrivera@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "TECUN AUTOMOTORES";
            $company->departament = "Universal de Autos";
            $company->email = "mlux@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "CREDIMAS";
            $company->departament = "CREDIMAS";
            $company->email = "dmramos@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "LA VISIÓN";
            $company->departament = "LA VISIÓN";
            $company->email = "mlux@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "SERVICIOS COMPARTIDOS (CADS)";
            $company->departament = "SERVICIOS COMPARTIDOS (CADS)";
            $company->email = "fpineda@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "AGROCOMILLAS";
            $company->departament = "AGROCOMILLAS";
            $company->email = "fpineda@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "INMOBILIARIAS";
            $company->departament = "INMOBILIARIAS";
            $company->email = "fpineda@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();

            $company = new Company;
            $company->name = "FINCAS";
            $company->departament = "FINCAS";
            $company->email = "fpineda@grupotecun.com";
            //$company->email = "norellana@pctecbus.co";
            $company->save();
        }

        
    }
}
