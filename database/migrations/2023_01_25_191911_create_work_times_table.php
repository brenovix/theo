<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('work_times', function (Blueprint $table) {
            $table->id('wt_id');
            $table->integer('wt_day')->nullable(false);
            $table->time('wt_start');
            $table->time('wt_end');
            $table->boolean('wt_active');
            $table->timestamp('wt_created_at')->useCurrent();
            $table->timestamp('wt_updated_at')->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_times');
    }
};
