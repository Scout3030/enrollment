<?php

namespace Database\Seeders;

use App\Models\BusStop;
use App\Models\Route;
use Illuminate\Database\Seeder;

class BusStopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routes   = [
            [
                'name' => 'RUTA 259 (PANDO)',
                'bus_stops' => [
                    'Morente',
                    'Lugido',
                    'Pando1',
                    'Pando2',
                    'Covadonga'
                ]
            ],
            [
                'name' => 'RUTA 307 (BUENO)',
                'bus_stops' => [
                    'Bueño',
                    'Cruce Ferreros',
                    'Soto del Rey',
                    'Las Segadas-Entrepuentes',
                    'El Caleyo',
                    'La Manjoya-Cruce Llamaoscura',
                    'Cruce Toral (San Torcuato)',
                    'Los Prietos',
                    'Bolgachina-El Caserón'
                ],
            ],
            [
                'name' => 'RUTA 9991113 (TUDELA VEGUÍN)',
                'bus_stops' => [
                    'TudelaAgüeria',
                    'Anieves',
                    'San Roque',
                    'Tudela Veguín-Colegio',
                    'Tudela Veguín',
                    'Cortina (Naves)',
                    'Bendones',
                    'El Calderu (San Esteban de las Cruces)',
                    'Alto del Herrador (San Esteban de las Cruces)'
                ],
            ],
            [
                'name' => 'RUTA 999562 (ABULI)',
                'bus_stops' => [
                    'Santa Ana de Abuli',
                    'San Cipriano de Pando',
                    'Faro',
                    'Caravia-Transformador',
                    'Casa Telva',
                    'Cerdeño-Cruce Limanes'
                ],
            ],
            [
                'name' => 'RUTA 9991116 (OLLONIEGO)',
                'bus_stops' => [
                    'cruce de santianes',
                    'Santa Eulalia',
                    'Olloniego',
                    'La Manzaneda',
                    'Pando-Cruce Paderni',
                    'sE Torneru-Cruce Valdemora',
                    'San Esteban de las Cruces',
                    'Morente de la Torre'
                ],
            ],
            [
                'name' => 'RUTA 44124 (CASIELLES)',
                'bus_stops' => [
                    'Casíelles',
                    'Los Prietos'
                ],
            ],
        ];

        foreach ($routes as $routeArray){
            $route = Route::factory([
                'name' => $routeArray['name']
            ])->create();

            foreach ($routeArray['bus_stops'] as $busStop){
                BusStop::factory([
                    'route_id' => $route->id,
                    'name' => $busStop
                ])
                    ->create();
            }
        }
    }
}
