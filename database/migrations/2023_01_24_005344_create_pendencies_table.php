<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('pendencies', function (Blueprint $table) {
            $table->id('pen_id');
            $table->foreignId('pen_technician')->nullable(false)->constrained('users', 'user_id');
            $table->foreignId('pen_company')->nullable(false)->constrained('companies', 'com_id');
            $table->foreignId('pen_priority')->nullable(false)->constrained('priorities', 'pr_id');
            $table->longText('pen_description')->nullable(false);
            $table->string('pen_type', 20)->nullable(false);
            $table->foreignId('pen_status')->nullable(false)->constrained('status', 'st_id');
            $table->timestamp('pen_created_at')->useCurrent();
            $table->timestamp('pen_updated_at')->useCurrentOnUpdate();
            $table->timestamp('pen_solution')->nullable();
            $table->longText('pen_solution');
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
        Schema::dropIfExists('pendencies');
    }
};
