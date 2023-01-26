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
        Schema::create('status', function (Blueprint $table) {
            $table->id('st_id');
            $table->string('st_name')->nullable(false);
            $table->foreignId('st_type')->nullable(false)->constrained('status_types', 'st_id');
            $table->string('st_color')->nullable(false)->default('#FAFAFA');
            $table->foreignId('st_mode')->nullable()->constrained('status_modes', 'sm_id');
            $table->timestamp('st_created_at')->useCurrent();
            $table->timestamp('st_updated_at')->useCurrentOnUpdate();
            $table->uuid('st_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('status');
    }
};
