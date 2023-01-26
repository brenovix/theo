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
        Schema::create('ticket_messages', function (Blueprint $table) {
            $table->id('tm_id');
            $table->foreignId('tm_ticket')->nullable(false)->constrained('tickets', 'ti_id');
            $table->text('tm_text')->nullable(false);
            $table->foreignId('tm_responsible')->nullable(false)->constrained('users', 'user_id');
            $table->boolean('tm_private')->nullable(false)->default(0);
            $table->uuid('tm_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
            $table->timestamp('tm_created_at')->useCurrent();
            $table->timestamp('tm_updated_at')->useCurrentOnUpdate();
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
        Schema::dropIfExists('ticket_messages');
    }
};
