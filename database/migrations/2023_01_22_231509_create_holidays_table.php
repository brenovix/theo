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
        Schema::create('holidays', function (Blueprint $table) {
            $table->id('ho_id');
            $table->date('ho_date')->nullable(false);
            $table->string('ho_desc', 30)->nullable(false);
            $table->foreignId('ho_type')->nullable(false)->constrained('holiday_types', 'ht_id');
            $table->timestamp('ho_created_at')->useCurrent();
            $table->timestamp('ho_updated_at')->useCurrentOnUpdate();
            $table->uuid('ho_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
            $table->charset = 'utf8mb4';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holidays');
    }
};
