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
        Schema::create('password_recoveries', function (Blueprint $table) {
            $table->id('pr_id');
            $table->foreignId('pr_user')->nullable(false)->constrained('users', 'user_id');
            $table->timestamp('pr_start')->nullable(false)->useCurrent();
            $table->timestamp('pr_end')->nullable();
            $table->uuid('pr_token')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_recoveries');
    }
};
