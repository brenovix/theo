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
        Schema::create('sectors', function (Blueprint $table) {
            $table->id('sec_id');
            $table->string('sec_name', 99)->nullable(false);
            $table->string('sec_obs', 255);
            $table->foreignId('sec_status')->nullable(false)->constrained('status', 'st_id');
            $table->timestamp('sec_created_at')->useCurrent();
            $table->timestamp('sec_updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->uuid('sec_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('sectors');
    }
};
