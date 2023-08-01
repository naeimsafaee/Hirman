<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemsToVitrinsTable extends Migration{

    public function up(){
        Schema::table('homes', function(Blueprint $table){
            $table->string('en_title')->nullable();
            $table->string('title')->nullable();
            $table->text('image')->nullable();
        });
    }

    public function down(){
        Schema::table('homes', function(Blueprint $table){
            //
        });
    }
}
