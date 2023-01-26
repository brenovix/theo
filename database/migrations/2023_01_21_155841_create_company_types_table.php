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
        Schema::create('company_types', function (Blueprint $table) {
            $table->id('ct_id');
            $table->string('ct_desc', 30)->nullable(false);
            $table->foreignId('ct_status')->nullable(false)->constrained('status', 'st_id');
            $table->timestamp('ct_created_at')->useCurrent();
            $table->timestamp('ct_updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->charset = 'utf8mb4';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_types');
    }
};
