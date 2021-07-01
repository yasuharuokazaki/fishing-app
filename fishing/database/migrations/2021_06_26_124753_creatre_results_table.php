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
            $table->integer('user_id');
            $table->string('name');
            $table->float('size')->nullable();
            $table->text('desc')->nullable();
            $table->float('temp')->nullable();
            $table->float('water_temp')->nullable();
            $table->float('wind')->nullable();
            $table->float('hPa')->nullable();
            $table->string('lon')->nullable();
            $table->string('lat')->nullable();
            $table->string('img_path')->nullable();
            $table->string('get_time')->nullable();
            $table->boolean('op_flag')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
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
