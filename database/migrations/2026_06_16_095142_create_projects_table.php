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
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->foreignId('freelancer_id')->constrained()->onDelete('cascade');
        $table->string('title');           // e.g. "Built e-commerce checkout"
        $table->text('description');       // what was done
        $table->string('client_name');     // dummy client name
        $table->decimal('amount_earned', 8, 2); // e.g. 1200.00
        $table->date('completed_at');      // when project ended
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
        Schema::dropIfExists('projects');
    }
};
