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
        Schema::create('time_status', function (Blueprint $table) {
            $table->id('ts_id');
            $table->foreignId('ts_ticket')->nullable(false)->constrained('tickets', 'ti_id');
            $table->foreignId('ts_status')->nullable(false)->constrained('status', 'st_id');
            $table->uuid('ts_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
            $table->timestamp('ts_created_at')->useCurrent();
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
        Schema::dropIfExists('time_status');
    }
};
