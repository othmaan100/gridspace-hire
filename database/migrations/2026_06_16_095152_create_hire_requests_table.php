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
    public function up(): void
{
    Schema::create('hire_requests', function (Blueprint $table) {
        $table->id();
        $table->foreignId('freelancer_id')->constrained()->onDelete('cascade');
        $table->string('job_title');
        $table->text('description');
        $table->string('duration');        // e.g. "2 weeks", "1 month"
        $table->decimal('total_amount', 8, 2); // calculated: hourly_rate × estimated hours
        $table->enum('status', ['pending', 'paid'])->default('pending');
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
        Schema::dropIfExists('hire_requests');
    }
};
