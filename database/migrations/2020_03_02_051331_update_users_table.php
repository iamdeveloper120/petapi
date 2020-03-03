<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_url')->comment('The link to user profile page')->default(null)->after('password');
            $table->string('user_activation_key')->nullable()->after('user_url');
            $table->string('user_status')->comment('1:active, 2:inactive, 3:pending, 4:suspended, 5:dropped')->default('1')->after('user_activation_key');
            $table->string('user_display_name')->nullable()->after('user_status');
            $table->text('user_profile_image')->nullable()->after('user_display_name');
            $table->ipAddress('user_ip')->nullable()->after('user_profile_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'user_url',
                'user_activation_key',
                'user_status',
                'user_display_name',
                'user_profile_image',
                'user_ip'
            ]);
        });
    }
}
