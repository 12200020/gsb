<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->decimal('price', 10, 2); // Assuming a decimal data type for the price with 10 digits in total and 2 decimal places
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('post_by');
            $table->foreign('post_by')->references('id')->on('users'); // Create a foreign key to the users table
            $table->timestamps(); // Adds created_at and updated_at columns for tracking timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
