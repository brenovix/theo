<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_login', 100)->nullable(false)->unique('unique_login');
            $table->string('user_name', 200)->nullable(false);
            $table->string('user_password', 100)->nullable();
            $table->string('user_email', 100)->nullable(false)->unique('unique_email');
            $table->string('user_phone', 15)->nullable();
            $table->foreignId('user_role')->nullable(false)->constrained('roles', 'ro_id');
            $table->foreignId('user_sector')->constrained('sectors', 'sec_id');
            $table->foreignId('user_company')->nullable(false)->constrained('companies', 'com_id');
            $table->timestamp('user_created_at')->useCurrent();
            $table->timestamp('user_updated_at')->useCurrentOnUpdate();
            $table->uuid('user_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
