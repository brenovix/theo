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
        Schema::create('fsr_tickets', function (Blueprint $table) {
            $table->foreignId('ft_ticket')->nullable(false)->primary()->constrained('tickets', 'ti_id');
            $table->foreignId('ft_fsr')->nullable(false)->primary()->constrained('field_service_reports', 'fsr_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fsr_tickets');
    }
};
