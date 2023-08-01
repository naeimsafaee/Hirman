<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToMoviesTable extends Migration{

    public function up(){
        Schema::table('movies', function(Blueprint $table){
            $table->text('vertical_image')->nullable();
        });
    }

    public function down(){
        Schema::table('movies', function(Blueprint $table){
            //
        });
    }
}
