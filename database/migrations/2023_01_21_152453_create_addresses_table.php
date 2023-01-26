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
        Schema::create('addresses', function (Blueprint $table) {
            $table->string('addr_code', 10)->primary();
            $table->string('addr_street', 99)->nullable(false);
            $table->string('addr_district', 50)->nullable(false);
            $table->string('addr_city', 50)->nullable(false)->index();
            $table->string('addr_state', 2)->nullable(false)->index();
            $table->timestamp('addr_created_at')->useCurrent();
            $table->timestamp('addr_updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8bm4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
