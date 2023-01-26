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
        Schema::create('http_methods', function (Blueprint $table) {
            $table->id('hm_id');
            $table->string('hm_nome', 10)->nullable(false);
            $table->string('hm_desc', 200);
            $table->timestamp('hm_created_at')->useCurrent();
            $table->timestamp('hm_updated_at')->useCurrentOnUpdate();
            $table->uuid('hm_uuid')->nullable(false)->default(DB::raw("(UUID_TO_BIN(UUID()))"));
        });
        DB::table('http_methods')->insert([
            [
                'hm_nome' => 'GET',
                'hm_desc' => 'The GET method requests a representation of the specified resource. Requests using GET should only retrieve data.'
            ],
            [
                'hm_nome' => 'POST',
                'hm_desc' => 'The POST method submits an entity to the specified resource, often causing a change in state or side effects on the server.'
            ],
            [
                'hm_nome' => 'PUT',
                'hm_desc' => 'The PUT method replaces all current representations of the target resource with the request payload.'
            ],
            [
                'hm_nome' => 'PATCH',
                'hm_desc' => 'The PATCH method applies partial modifications to a resource.'
            ],
            [
                'hm_nome' => 'DELETE',
                'hm_desc' => 'The DELETE method deletes the specified resource.'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('http_methods');
    }
};
