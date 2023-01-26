<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('telecom', function (Blueprint $table) {
            $table->id('tel_id');
            $table->foreignId('tel_company')->nullable(false)->constrained('companies', 'com_id');
            $table->foreignId('tel_supplier')->nullable(false)->constrained('suppiers', 'sup_id');
            $table->text('tel_info');
            $table->uuid('tel_uuid')->nullable(false)->default(DB::raw('(UUID_TO_BIN(UUID()))'));
            $table->timestamp('tel_created_at')->useCurrent();
            $table->timestamp('tel_updated_at')->useCurrentOnUpdate();
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
        Schema::dropIfExists('telecom');
    }
};
