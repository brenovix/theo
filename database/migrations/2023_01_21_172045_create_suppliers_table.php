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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('sup_id');
            $table->string('sup_short_name', 30)->nullable(false);
            $table->string('sup_full_name', 50);
            $table->string('sup_reg_code', 20);
            $table->string('sup_phone', 15)->nullable(false);
            $table->string('sup_email', 50);
            $table->timestamp('sup_created_at')->useCurrent();
            $table->timestamp('sup_updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->uuid('sup_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('suppliers');
    }
};
