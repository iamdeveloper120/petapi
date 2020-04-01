<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'pets';
        $this->command->info('truncating table pets');
        DB::table($table)->truncate();
        $this->command->info('truncated successfully');
        $pet = '';
        for ($i=0; $i<4; $i++) {
            if ($i == 0) $pet = 'bird';
            if ($i == 1) $pet = 'cat';
            if ($i == 2) $pet = 'dog';
            if ($i == 3) $pet = 'fish';
            DB::table($table)->insert([
                'title' => $pet,
                'description' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
