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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id('li_id');
            $table->foreignId('li_equipment')->nullable()->constrained('equipments', 'eq_id');
            $table->foreignId('li_company')->nullable()->constrained('companies', 'com_id');
            $table->foreignId('li_supplier')->nullable()->constrained('suppliers', 'sup_id');
            $table->foreignId('li_manufacturer')->nullable(false)->constrained('manufacturers', 'man_id');
            $table->string('li_serial', 255);
            $table->text('li_obs');
            $table->timestamp('li_created_at')->useCurrent();
            $table->timestamp('li_updated_at')->useCurrentOnUpdate();
            $table->uuid('li_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('licenses');
    }
};
