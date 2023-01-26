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
        Schema::create('field_service_reports', function (Blueprint $table) {
            $table->id('fsr_id');
            $table->foreignId('fsr_company')->nullable(false)->constrained('companies', 'com_id');
            $table->foreignId('fsr_sector')->nullable(false)->constrained('sectors', 'sec_id');
            $table->string('fsr_requester', 30)->nullable(false);
            $table->string('fsr_request', 100)->nullable(false);
            $table->time('fsr_start')->nullable(false);
            $table->time('fsr_end')->nullable(false);
            $table->foreignId('fsr_ticket')->nullable()->constrained('tickets', 'ti_id');
            $table->foreignId('fsr_attendance_type')->nullable(false)->constrained('field_service_attendance_types', 'fsat_id');
            $table->decimal('fsr_value', 5, 2, true)->nullable(false)->default(0.00);
            $table->longText('fsr_activities')->nullable(false);
            $table->text('fsr_pendencies');
            $table->timestamp('fsr_created_at')->useCurrent();
            $table->timestamp('fsr_updated_at')->useCurrentOnUpdate();
            $table->uuid('fsr_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('field_service_reports');
    }
};
