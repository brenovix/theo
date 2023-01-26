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
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->id('man_id');
            $table->string('man_full_name', 50);
            $table->string('man_short_name', 20)->nullable(false);
            $table->string('man_reg_code', 20);
            $table->string('man_email', 50);
            $table->string('man_phone', 15);
            $table->timestamp('man_created_at')->useCurrent();
            $table->timestamp('man_updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->uuid('man_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('manufacturers');
    }
};
