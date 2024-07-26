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
        Schema::create("chatter_message", function (Blueprint $table) {

            $table->unsignedBigInteger("chatter_id");
            $table->unsignedBigInteger("message_id");

            $table->timestamps();
        });

        Schema::table("chatter_message", function (Blueprint $table) {

            $table->foreign("chatter_id")->on("chatters")->references("id")->onDelete("cascade");
            $table->foreign("message_id")->on("messages")->references("id")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table("chatter_message", function (Blueprint $table) {
            $table->dropForeign(['chatter_id']);
            $table->dropForeign(['message_id']);

        });
        Schema::dropColumns("chatter_message", ["chatter_id", "message_id"]);
        Schema::dropIfExists("chatter_message");
    }
};
