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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id('eq_id');
            $table->foreignId('eq_model')->nullable(false)->constrained('models', 'mod_id');
            $table->string('eq_name', 30);
            $table->foreignId('eq_company')->nullable(false)->constrained('companies', 'com_id');
            $table->foreignId('eq_supplier')->nullable()->constrained('suppliers', 'sup_id');
            $table->string('eq_invoice', 30);
            $table->date('eq_order_date')->nullable(false);
            $table->foreignId('eq_ccenter')->nullable()->constrained('cost_centers', 'cc_id');
            $table->foreignId('eq_type')->nullable(false)->constrained('equipment_types', 'et_id');
            $table->foreignId('eq_status')->nullable(false)->constrained('status', 'st_id');
            $table->foreignId('eq_sector')->nullable()->constrained('sectors', 'sec_id');
            $table->string('eq_serial_number', 30);
            $table->json('eq_additional_info');
            $table->timestamp('eq_created_at')->nullable(false)->useCurrent();
            $table->timestamp('eq_updated_at')->nullable(false)->useCurrentOnUpdate();
            $table->uuid('eq_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('equipments');
    }
};
