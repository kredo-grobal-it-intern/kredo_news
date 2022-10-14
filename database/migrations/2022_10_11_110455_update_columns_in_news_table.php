<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsInNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->longText('content')->change();
            $table->longText('description')->change(); 

            $table->text('url')->change(); 
            $table->text('image')->change(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->text('content')->change();
            $table->text('description')->change();

            $table->longText('url')->change();
            $table->longText('image')->change(); 
        });
    }

}
