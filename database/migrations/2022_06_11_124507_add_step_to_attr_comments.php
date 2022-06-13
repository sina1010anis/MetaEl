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
        Schema::table('attr_comments', function (Blueprint $table) {
            $table->integer('step_1')->after('status');
            $table->integer('step_2')->after('step_1');
            $table->integer('step_3')->after('step_2');
            $table->integer('step_4')->after('step_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attr_comments', function (Blueprint $table) {
            //
        });
    }
};
