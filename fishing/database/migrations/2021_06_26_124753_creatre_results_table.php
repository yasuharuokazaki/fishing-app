<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatreResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('size');
            $table->text('desc');
            $table->float('temp');
            $table->float('water_temp');
            $table->float('wind');
            $table->float('hPa');
            $table->float('lon');
            $table->float('lat');
            $table->string('img_path');
            $table->time('get_time');
            $table->timestamp('update_at');
            $table->timestamp('create_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
