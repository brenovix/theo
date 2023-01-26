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
        Schema::create('system_permissions', function (Blueprint $table) {
            $table->id('sp_id');
            $table->string('sp_desc', 30)->nullable(false);
            $table->foreignId('sp_path')->nullable(false)->constrained('system_pathes', 'sp_id');
            $table->foreignId('sp_level')->nullable(false)->constrained('levels', 'lv_id');
            $table->foreignId('sp_method')->nullable(false)->constrained('http_methods', 'hm_id');
            $table->uuid('sp_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
            $table->timestamp('sp_created_at')->useCurrent();
            $table->timestamp('sp_updated_at')->useCurrentOnUpdate();
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
        Schema::dropIfExists('system_permissions');
    }
};
