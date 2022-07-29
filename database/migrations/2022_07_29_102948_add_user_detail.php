<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('profile_url')->default('assets/image/user/user-icon.png')->before("created_at");
            $table->string('address')->nullable()->before("profile_url");
            $table->string('mobile_no')->nullable()->before("address");
            $table->date('dob')->nullable()->before("mobile_no");
            $table->boolean('status')->default(false)->before("dob");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn(['profile_url', 'address', 'mobile_no', 'dob', 'status']);
        });
    }
};
