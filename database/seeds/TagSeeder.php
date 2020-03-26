<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class TagSeeder extends Seeder
{
    protected $file;
    protected $table;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
    {
        $this->file = base_path().'/database/seeds/csvs/animal_names.json';
        $this->table = 'tags';
    }
    public function run()
    {
        $faker = Faker::create();
        DB::table($this->table)->truncate();
        $this->command->info('Reading animal names...');
        $json = json_decode(file_get_contents($this->file), true);
        $this->command->info('Found '.count($json). ' animals ... Seeding!...');
        foreach ($json as $item => $value) {
            DB::table($this->table)->insert([
                'title' => $value,
                'description' => $faker->text(),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
