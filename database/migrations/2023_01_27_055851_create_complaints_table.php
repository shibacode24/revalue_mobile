<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->string('brand_id');
            $table->string('model_name');
            $table->string('problem_type');
            $table->string('sub_problem_type_id');
            $table->string('details');
            $table->string('date');
            $table->string('time');
            $table->string('user_id');
            $table->string('status');
            $table->string('city_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}
