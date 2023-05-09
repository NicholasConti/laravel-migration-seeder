<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainsCSVTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_file = __DIR__ . '/csv/trains.csv';

        $trains = $this->getCSV($current_file);

        foreach ($trains as $train) {
            $newTrain = new Train();
            $newTrain->company = $train['company'];
            $newTrain->station_departure = $train['station_departure'];
            $newTrain->station_arrival = $train['station_arrival'];
            $newTrain->departure_time = $train['departure_time'];
            $newTrain->arrival_time = $train['arrival_time'];
            $newTrain->train_code = $train['train_code'];
            $newTrain->n_wagons = $train['n_wagons'];
            $newTrain->in_time = $train['in_time'];
            $newTrain->cancelled = $train['cancelled'];
            $newTrain->save();
        }
    }

    public function getCSV(string $file_stream)
    {
        $labels = [];
        $result = [];

        $row = 1;
        if (($handle = fopen($file_stream, "r")) !== FALSE) {

            while (($data = fgetcsv($handle)) !== FALSE) {

                $current_row = [];
                if ($row === 1) {
                    foreach ($data as $label) {
                        $labels[] = trim(strtolower($label));
                    }
                } else {
                    foreach ($data as $key => $value) {
                        $current_key = $labels[$key];
                        $current_row[$current_key] = $value;
                    }
                    array_push($result, $current_row);
                }

                $row++;
            }

            fclose($handle);

            return $result;
        }
    }
}
