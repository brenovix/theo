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
        Schema::create('equipment_withdrawals', function (Blueprint $table) {
            $table->id('ew_id');
            $table->foreignId('ew_equipment')->nullable(false)->constrained('equipments', 'eq_id');
            $table->foreignId('ew_fsr')->nullable()->constrained('field_service_reports', 'fsr_id');
            $table->foreignId('ew_status')->nullable(false)->constrained('status', 'st_id');
            $table->timestamp('ew_created_at')->useCurrent()->index('withdrawal_date');
            $table->timestamp('ew_updated_at')->useCurrentOnUpdate();
            $table->timestamp('ew_returning_date');
            $table->uuid('ew_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_withdrawals');
    }
};
