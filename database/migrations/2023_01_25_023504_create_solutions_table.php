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
        Schema::create('solutions', function (Blueprint $table) {
            $table->id('so_id');
            $table->foreignId('so_problem')->nullable(false)->constrained('problems', 'prob_id');
            $table->text('so_desc')->nullable(false);
            $table->foreignId('so_responsible')->nullable(false)->constrained('users', 'user_id');
            $table->uuid('so_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
            $table->timestamp('so_created_at')->useCurrent();
            $table->timestamp('so_updated_at')->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solutions');
    }
};
