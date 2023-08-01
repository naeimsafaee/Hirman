<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mags', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->enum('type',["internal","foreign","blog"]);
            $table->boolean('isVideo')->default(0);
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->longText('content');
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
        Schema::dropIfExists('mags');
    }
}
