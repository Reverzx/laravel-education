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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('genre_id')->constrained('genres');

            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->string('publication_date')->nullable();
            $table->string('isbn')->unique()->comment('this is unique books nubmer');
            $table->string('cover_image')->nullable();

            $table->boolean('available')->default(true);
            $table->timestamp('available_at')->nullable();




            //$table->bigInteger('genre_id')->unsigned()->nullable();
            //$table->foreign('genre_id')->references('id')->on('genre')->onDelete('set null');

            //$table->bigInteger('author_id')->nullable();
            //$table->bigInteger('publishers_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
