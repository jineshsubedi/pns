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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id')->index();
            $table->unsignedBigInteger('category_id')->index();
            $table->string('title');
            $table->string('code');
            $table->text('description');
            $table->text('specification')->nullable();
            $table->boolean('negotiable')->default(true);
            $table->string('type');
            $table->string('image')->nullable();
            $table->double('salary', 15,2);
            $table->integer('position');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
