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
        Schema::create('problems', function (Blueprint $table) {
            $table->id('prob_id');
            $table->string('prob_name', 1000)->nullable(false);
            $table->foreignId('prob_category')->nullable(false)->constrained('categories', 'cat_id');
            $table->text('prob_description');
            $table->foreignId('prob_priority')->nullable(false)->constrained('priorities', 'pr_id');
            $table->timestamp('prob_created_at')->useCurrent();
            $table->timestamp('prob_updated_at')->useCurrentOnUpdate();
            $table->uuid('prob_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('problems');
    }
};
