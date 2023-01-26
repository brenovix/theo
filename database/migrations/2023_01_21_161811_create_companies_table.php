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
        Schema::create('companies', function (Blueprint $table) {
            $table->id('com_id');
            $table->string('com_full_name', 99)->nullable(false);
            $table->string('com_short_name', 30);
            $table->string('com_reg_number', 20)->unique('unique_regnumber');
            $table->string('com_secondary_number', 20);
            $table->foreignId('com_type')->nullable(false)->constrained('company_types', 'ct_id');
            $table->string('com_addr_code', 10);
            $table->string('com_addr_number', 10);
            $table->string('com_addr_complement', 100);
            $table->foreignId('com_status')->nullable(false)->constrained('status', 'st_id');
            $table->unsignedInteger('com_max_tickets_month');
            $table->foreignId('com_headquarter')->nullable()->constrained('companies', 'ct_id');
            $table->foreign('com_addr_code', 'company_addr_code')->references('addr_code')->on('addresses');
            $table->timestamp('com_created_at')->useCurrent();
            $table->timestamp('com_updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->uuid('com_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('companies');
    }
};
