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
        Schema::create('connection_link_types', function (Blueprint $table) {
            $table->id('clt_id');
            $table->string('clt_desc', 99)->nullable(false);
            $table->timestamp('clt_created_at')->useCurrent();
            $table->timestamp('clt_updated_at')->useCurrentOnUpdate();
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
        Schema::dropIfExists('connection_link_types');
    }
};
