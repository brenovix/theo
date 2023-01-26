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
        Schema::create('cost_centers_companies', function (Blueprint $table) {
            $table->foreignId('ccc_center')->nullable(false)->primary()->constrained('cost_centers', 'cc_id');
            $table->foreignId('ccc_company')->nullable(false)->primary()->constrained('companies', 'com_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cost_centers_companies');
    }
};
