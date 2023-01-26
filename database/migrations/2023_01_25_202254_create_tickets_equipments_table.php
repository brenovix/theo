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
        Schema::create('tickets_equipments', function (Blueprint $table) {
            $table->foreignId('te_ticket')->nullable(false)->primary()->constrained('tickets', 'ti_id');
            $table->foreignId('te_equipment')->nullable(false)->primary()->constrained('equipments', 'eq_id');
            $table->timestamp('te_created_at')->useCurrent();
            $table->timestamp('te_updated_at')->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets_equipments');
    }
};
