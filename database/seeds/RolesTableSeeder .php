<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        for ($i=0; $i<5; $i++) {
            $role = '';
            if($i == 0) $role = 'admin';
            if($i == 1) $role = 'user';
            if($i == 2) $role = 'editor';
            if($i == 3) $role = 'contributor';
            if($i == 4) $role = 'subscriber';

            Role::create(['name' => $role]);
            $now = Carbon::now()->format('Y-m-d H:i:s');
            $admin = factory(\App\User::class)->create([
                'name' => $role,
                'email' => "mfarhan@{$role}.com",
                'email_verified_at' => $now,
                'password' => bcrypt('password'),
                'user_url' => url()->current().'/'.$role,
                'user_activation_key' => bcrypt('password'),
                'user_status' => 1,
                'user_display_name' => $role,
                'user_profile_image' => '',
                'user_ip' => request()->ip(),
                'created_at' => $now,
                'updated_at' => $now
            ]);
            $admin->assignRole($role);
        }
    }
}
