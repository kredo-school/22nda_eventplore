<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id(); 
            $table->string('event_name', 50); 
            $table->string('address', 255); 
            $table->float('latitude');
            $table->float('longitude');
            $table->unsignedBigInteger('area_id');
            $table->date('start_date'); 
            $table->date('finish_date'); 
            $table->time('start_time'); 
            $table->time('finish_time'); 
            $table->unsignedBigInteger('event_owner_id');
            $table->text('details'); 
            $table->text('history'); 
            $table->integer('max_participants'); 
            $table->dateTime('app_deadline'); 
            $table->integer('price');
            $table->text('parking');
            $table->text('train');
            $table->text('toilet');
            $table->text('weather');
            $table->unsignedBigInteger('category_id');
            $table->text('add_info');
            $table->text('insta_link')->nullable(); 
            $table->text('facebook_link')->nullable(); 
            $table->text('x_link')->nullable(); 
            $table->text('official')->nullable();
            $table->timestamps(); 
            $table->softDeletes();

            $table->foreign('event_owner_id')->references('id')->on('event_owners');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
