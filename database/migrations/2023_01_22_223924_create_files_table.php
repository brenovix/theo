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
        Schema::create('files', function (Blueprint $table) {
            $table->id('f_id');
            $table->string('f_title', 99)->nullable(false);
            $table->string('f_name', 99)->nullable(false)->index('file_name');
            $table->string('f_mimetype', 20)->nullable(false);
            $table->string('f_url', 2048)->nullable(false);
            $table->text('f_desc');
            $table->foreignId('f_company')->nullable(false)->constrained('companies', 'com_id');
            $table->timestamp('f_created_at')->useCurrent();
            $table->timestamp('f_updated_at')->useCurrentOnUpdate();
            $table->uuid('f_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('files');
    }
};
