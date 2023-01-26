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
        Schema::create('field_service_attendance_types', function (Blueprint $table) {
            $table->id('fsat_id');
            $table->string('fsat_name', 30)->unique('attendance_type_name');
            $table->timestamp('fsat_created_at')->useCurrent();
            $table->timestamp('fsat_updated_at')->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_service_attendance_types');
    }
};
