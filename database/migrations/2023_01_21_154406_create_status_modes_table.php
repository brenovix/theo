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
        Schema::create('status_modes', function (Blueprint $table) {
            $table->id('sm_id');
            $table->string('sm_desc', 30)->nullable(false);
            $table->timestamp('sm_created_at')->useCurrent();
            $table->timestamp('sm_updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_modes');
    }
};
