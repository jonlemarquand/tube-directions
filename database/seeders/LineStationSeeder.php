<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LineStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $northern = array('Camden Town', 'Mornington Crescent', 'Euston', 'Warren Street', 'Goodge Street', 'Tottenham Court Road', 'Leicester Square', 'Charing Cross', 'Embankment', 'Waterloo', 'Kennington', 'Oval', 'Stockwell', 'Clapham North');
        $victoria = array('Walthamstow Central', 'Blackhorse Road', 'Tottenham Hale', 'Seven Sisters', 'Finsbury Park', 'Highbury & Islington', "King's Cross St. Pancras", 'Warren Steet', 'Oxford Circus', 'Green Park', 'Victoria', 'Pimlico', 'Vauxhall', 'Stockwell', 'Brixton');
        $picadilly = array('Manor House', 'Arsenal', 'Holloway Road', 'Caledonian Road', "King's Cross St. Pancras", 'Russell Square', 'Holburn', 'Covent Garden', 'Leicester Square', 'Piccadilly Circus', 'Green Park', 'Hyde Park Corner');

        $this->addLineStation($northern, 1);
        $this->addLineStation($victoria, 2);
        $this->addLineStation($picadilly, 3);
    }

    private function addLineStation($lines, $number)
    {
        foreach($lines as $key => $station) {
            $stationFull = Station::where('name', '=', $station)->firstOrFail();
            $stationId = $stationFull['id'];
            if(isset($stationId)) {
                DB::table('line_stations')->insert([
                    'line_id' => $number,
                    'station_id' => $stationId,
                    'line_position' => $key + 1,
                ]);
            }
        }
    }
}
