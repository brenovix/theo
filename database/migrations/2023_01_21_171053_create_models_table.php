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
        Schema::create('models', function (Blueprint $table) {
            $table->id('mod_id');
            $table->foreignId('mod_manufacturer')->nullable(false)->constrained('manufacturers', 'man_id');
            $table->string('mod_desc', 40)->nullable(false);
            $table->text('mod_obs');
            $table->timestamp('mod_created_at')->useCurrent();
            $table->timestamp('mod_updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->uuid('mod_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('models');
    }
};
