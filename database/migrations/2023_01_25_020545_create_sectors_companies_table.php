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
        Schema::create('sectors_companies', function (Blueprint $table) {
            $table->foreignId('sc_sector')->nullable(false)->primary()->constrained('sectors', 'sec_id');
            $table->foreignId('sc_company')->nullable(false)->primary()->constrained('companies', 'com_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sectors_companies');
    }
};
