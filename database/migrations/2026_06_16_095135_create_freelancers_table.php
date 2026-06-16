<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');           // e.g. "Laravel Backend Developer"
            $table->json('skills');            // e.g. ["Laravel", "MySQL", "REST API"]
            $table->decimal('hourly_rate', 8, 2); // e.g. 45.00
            $table->decimal('rating', 3, 1);  // e.g. 4.8 (out of 5)
            $table->text('bio');              // short intro shown on listing
            $table->string('avatar')->nullable(); // profile photo URL or null
            $table->integer('jobs_completed')->default(0);
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
        Schema::dropIfExists('freelancers');
    }
};
