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
        Schema::create('message_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('message_id');
            $table->unsignedBigInteger('tag_id');

            $table->index("message_id", "message_tag_message_idx");
            $table->index("tag_id", "message_tag_tag_idx");

            $table->foreign("message_id", "message_tag_message_fk")->on("messages")->references("id");
            $table->foreign("tag_id", "messages_tag_tag_fk")->on("tags")->references("id");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_tags');
    }
};
