<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationSeeder extends Seeder
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

        $this->insertStationFromArray($northern);
        $this->insertStationFromArray($victoria);
        $this->insertStationFromArray($picadilly);

    }

    private function createSlug($slug): string
    {
        $slug = str_replace(['&', '.', "'"], '', $slug);
        $slug = str_replace(['  ',' '], '-', $slug);
        return strtolower($slug);
    }

    private function insertStationFromArray($array)
    {
        foreach($array as $station) {
            $slug = $this->createSlug($station);
            Station::updateOrCreate(
                ['slug' => $slug],
                ['name' => $station, 'slug' => $slug]
            );
        }
    }
}
