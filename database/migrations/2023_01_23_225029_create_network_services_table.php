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
        Schema::create('network_services', function (Blueprint $table) {
            $table->id('ns_id');
            $table->string('ns_name', 50)->nullable(false);
            $table->foreignId('ns_supplier')->nullable()->constrained('suppliers', 'sup_id');
            $table->foreignId('ns_status')->nullable(false)->constrained('status', 'st_id');
            $table->timestamp('ns_created_at')->useCurrent();
            $table->timestamp('ns_updated_at')->useCurrentOnUpdate();
            $table->uuid('ns_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('network_services');
    }
};
