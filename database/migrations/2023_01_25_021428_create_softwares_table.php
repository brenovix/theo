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
        Schema::create('softwares', function (Blueprint $table) {
            $table->id('sw_id');
            $table->foreignId('sw_manufacturer')->nullable()->constrained('manufacturers', 'man_id');
            $table->string('sw_desc', 30)->nullable(false);
            $table->string('sw_version', 20)->nullable();
            $table->uuid('sw_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
            $table->timestamp('sw_created_at')->nullable(false)->useCurrent();
            $table->timestamp('sw_updated_at')->nullable(false)->useCurrentOnUpdate();
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
        Schema::dropIfExists('softwares');
    }
};
