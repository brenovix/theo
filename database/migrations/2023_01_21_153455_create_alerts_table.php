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
        Schema::create('alerts', function (Blueprint $table) {
            $table->id('al_id');
            $table->text('al_msg')->nullable(false);
            $table->dateTime('al_start')->nullable(false);
            $table->dateTime('al_end')->nullable(false);
            $table->timestamp('al_created_at')->useCurrent();
            $table->timestamp('al_updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->uuid('al_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('alerts');
    }
};
