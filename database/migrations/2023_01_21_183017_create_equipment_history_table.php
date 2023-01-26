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
        Schema::create('equipment_history', function (Blueprint $table) {
            $table->id('eh_id');
            $table->foreignId('eh_equipment')->nullable(false)->constrained('equipments', 'eq_id');
            $table->text('eh_info');
            $table->timestamp('eh_created_at')->nullable(false)->useCurrent();
            $table->timestamp('eh_updated_at')->nullable(false)->useCurrentOnUpdate();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_history');
    }
};
