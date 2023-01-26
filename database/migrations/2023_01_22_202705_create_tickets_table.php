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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('ti_id');
            $table->foreignId('ti_problem')->nullable()->constrained('problems', 'prob_id');
            $table->text('ti_desc')->nullable(false);
            $table->string('ti_contact', 100)->nullable();
            $table->foreignId('ti_user')->nullable(false)->constrained('users', 'user_id');
            $table->foreignId('ti_company')->nullable(false)->constrained('companies', 'com_id');
            $table->foreignId('ti_sector')->nullable()->constrained('sectors', 'sec_id');
            $table->foreignId('ti_operator_user')->nullable()->constrained('users', 'user_id');
            $table->foreignId('ti_status')->nullable(false)->constrained('status', 'st_id');
            $table->foreignId('ti_priority')->nullable(false)->constrained('priorities', 'pr_id');
            $table->foreignId('ti_solution_type')->nullable()->constrained('solution_types', 'st_id');
            $table->timestamp('ti_created_at')->nullable(false)->useCurrent()->index('open_date');
            $table->timestamp('ti_scheduling')->nullable(false)->useCurrent()->index('scheduling');
            $table->timestamp('ti_updated_at')->nullable(false)->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('ti_attendance_start')->index('attendance_start');
            $table->timestamp('ti_closed_at')->index('close_date');
            $table->uuid('ti_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('tickets');
    }
};
