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
        Schema::create('slas', function (Blueprint $table) {
            $table->id('sla_id');
            $table->time('sla_attendance')->nullable(false);
            $table->time('sla_ending')->nullable(false);
            $table->string('sla_desc', 30)->nullable(false);
            $table->timestamp('sla_created_at')->nullable(false)->useCurrent();
            $table->timestamp('sla_updated_at')->nullable(false)->useCurrentOnUpdate();
            $table->uuid('sla_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slas');
    }
};
