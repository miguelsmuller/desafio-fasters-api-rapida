<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up() {
        Schema::create('cities', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('name', 50);
            $table->dateTime('date');
            $table->decimal('measurement', $precision = 4, $scale = 2);

            $table->primary('id');
        });
    }

    public function down() {
        Schema::dropIfExists('cities');
    }
}
