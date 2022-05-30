<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $routes   = ['RUTA 259 (PANDO): Morente/Lugido/Pando1/Pando2/Covadonga',
        'RUTA 307 (BUENO): Bueño/Cruce Ferreros/Soto del Rey/Las Segadas-Entrepuentes/El Caleyo/La Manjoya-Cruce
         Llamaoscura/Cruce Toral (San Torcuato)/Los Prietos/Bolgachina-El Caserón',
        'RUTA 9991113 (TUDELA VEGUÍN): TudelaAgüeria/ Anieves/San Roque/Tudela Veguín-Colegio/Tudela Veguín/Cortina
         (Naves)/Bendones/El Calderu (San Esteban de las Cruces)/Alto del Herrador (San Esteban de las Cruces)',
        'RUTA 999562 (ABULI):Santa Ana de Abuli/ San Cipriano de Pando/Faro/Caravia-Transformador/Casa Telva/ Cerdeño-
         Cruce Limanes',
        'RUTA 9991116 (OLLONIEGO): cruce de santianes/ Santa Eulalia/ Olloniego/La Manzaneda/Pando-Cruce Paderni/sE
         Torneru-Cruce Valdemora/San Esteban de las Cruces/Morente de la Torre',
        'RUTA 44124 (CASIELLES): Casíelles/ Los Prietos', ];
        
        foreach ($routes as $route){
            Route::create(['name' => $route]);
            }
    }
}
