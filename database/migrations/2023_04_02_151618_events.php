<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('img');
            $table->bigInteger('genere_id');
            $table->bigInteger('artist_id');
            $table->string('desc');
            $table->bigInteger('amt');
            $table->date('dt');
            $table->integer('venue_id');
           
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
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
        Schema::dropIfExists('events');
    }
}
