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
        Schema::create('priorities', function (Blueprint $table) {
            $table->id('pr_id');
            $table->string('pr_desc', 20);
            $table->foreignId('pr_sla')->nullable(false)->constrained('slas', 'sla_id');
            $table->string('color', 7)->nullable()->default('#CCC');
            $table->timestamp('pr_created_at')->useCurrent();
            $table->timestamp('pt_updated_at')->useCurrentOnUpdate();
            $table->uuid('pr_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
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
        Schema::dropIfExists('priorities');
    }
};
