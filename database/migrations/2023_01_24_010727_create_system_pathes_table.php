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
        Schema::create('system_pathes', function (Blueprint $table) {
            $table->id('sp_id');
            $table->string('sp_path', 255)->nullable(false);
            $table->string('sp_nome', 50)->nullable(false);
            $table->timestamp('sp_created_at')->useCurrent();
            $table->timestamp('sp_updated_at')->useCurrentOnUpdate();
            $table->uuid('sp_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('system_pathes');
    }
};
