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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('cat_id');
            $table->string('cat_desc', 30)->nullable(false);
            $table->foreignId('cat_company')->nullable()->constrained('companies', 'com_id');
            $table->foreignId('cat_sector')->nullable()->constrained('sectors', 'sec_id');
            $table->foreignId('cat_company')->nullable(false)->constrained('companies', 'com_id');
            $table->timestamp('cat_created_at')->useCurrent();
            $table->timestamp('cat_updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->uuid('cat_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('categoies');
    }
};
