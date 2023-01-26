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
        Schema::create('connection_links', function (Blueprint $table) {
            $table->id('cl_id');
            $table->foreignId('cl_company')->nullable(false)->constrained('companies', 'com_id');
            $table->foreignId('cl_supplier')->nullable(false)->constrained('suppliers', 'sup_id');
            $table->string('cl_speed', 50);
            $table->string('cl_ip', 128);
            $table->foreignId('cl_type')->nullable(false)->constrained('connection_link_types', 'clt_id');
            $table->timestamp('cl_created_at')->useCurrent();
            $table->timestamp('cl_updated_at')->useCurrentOnUpdate();
            $table->uuid('cl_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('connection_links');
    }
};
