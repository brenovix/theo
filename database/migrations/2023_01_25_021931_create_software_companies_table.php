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
        Schema::create('software_companies', function (Blueprint $table) {
            $table->id('sc_id');
            $table->foreignId('sc_software')->nullable(false)->constrained('softwares', 'sw_id');
            $table->foreignId('sc_company')->nullable(false)->constrained('companies', 'com_id');
            $table->foreignId('sc_supplier')->nullable()->constrained('suppliers', 'sup_id');
            $table->integer('sc_nf', 9);
            $table->uuid('sc_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
            $table->timestamp('sc_created_at')->useCurrent();
            $table->timestamp('sc_updated_at')->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('software_companies');
    }
};
