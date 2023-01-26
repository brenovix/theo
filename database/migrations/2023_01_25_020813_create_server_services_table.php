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
        Schema::create('server_services', function (Blueprint $table) {
            $table->foreignId('ss_server')->nullable(false)->primary()->constrained('equipments', 'eq_id');
            $table->foreignId('ss_service')->nullable(false)->primary()->constrained('network_services', 'ns_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_services');
    }
};
