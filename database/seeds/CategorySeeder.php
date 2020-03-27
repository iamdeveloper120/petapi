<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    protected $file;
    protected $table;

    public function __construct()
    {
        $this->file = base_path().'/database/seeds/csvs/categories.json';
        $this->table = 'categories';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table($this->table)->truncate();
        $json = json_decode(file_get_contents($this->file), true);
        $this->command->info('Found '.count($json). ' objects ...');
        foreach ($json as $item => $value) {
            $guid = bin2hex(openssl_random_pseudo_bytes(16));
            DB::table($this->table)->insert([
                'user_id' => $value['user_id'],
                'title' => $value['title'],
                'name' => $value['title'],
                'slug' => strtolower($value['title']),
                'guid' => $guid,
                'description' => $faker->text(),
                'section' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
